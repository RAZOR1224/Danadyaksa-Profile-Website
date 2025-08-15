<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Validation\ValidationException;

class PredictionController extends Controller
{
    public function getPrediction(Request $request)
    {
        // 1. Validasi input (Tidak ada perubahan)
        try {
            $payload = $request->validate([
                'kategori_perkara'      => 'required|string|in:Perdata,Pidana,PHI,TUN',
                'deskripsi_perkara'     => 'required|string',
                'subjek_hukum_lawan'    => 'required|string',
                'lokasi_sengketa'       => 'required|string',
                'status_bukti_awal'     => 'required|string|in:Lengkap,Sebagian,Tidak Ada',
                'tahapan_hukum'         => 'required|string|in:Tingkat Pertama,Banding,Kasasi,Mediasi',
                'kompleksitas_perkara'  => 'required|string|in:Sederhana,Menengah,Kompleks',
                'subjek_hukum_klien'    => 'required|string',
                'jalur_penyelesaian'    => 'required|string',
                'hasil_akhir'           => 'required|string',
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        }

        // 2. Simpan input asli (Tidak ada perubahan)
        $inputData = $request->all();

        // 3. Tambahkan 'pengadilan_berwenang' ke payload (Tidak ada perubahan)
        $payload['pengadilan_berwenang'] = $this->getPengadilanFromLokasi(
            $payload['lokasi_sengketa'],
            $payload['kategori_perkara'],
            $payload['deskripsi_perkara']
        );

        // 4. Ambil URL dan TOKEN dari file .env (INI YANG DIUBAH)
        $apiUrl = env('HUGGINGFACE_API_URL', 'https://iknasius-predict-duration-of-law-case-models.hf.space/predict');

        try {
            // 5. Buat request dengan menyertakan token (Tidak ada perubahan)
            $response = Http::timeout(30)
                            ->post($apiUrl, $payload);

            // 6. Proses respons (Tidak ada perubahan)
            if ($response->successful()) {
                $predictionResult = $response->json();
                return view('pages.predict_result', [
                    'prediction' => $predictionResult,
                    'input'      => $inputData
                ]);
            } else {
                $error = $response->json();
                $errorMessage = "Gagal mendapatkan prediksi. Server model merespons: " . ($error['error'] ?? $response->body());
                return back()->with('api_error', $errorMessage)->withInput();
            }

        } catch (ConnectionException $e) {
            $errorMessage = "Tidak dapat terhubung ke server prediksi. Periksa kembali URL API dan koneksi internet.";
            return back()->with('api_error', $errorMessage)->withInput();
        }
    }

    /**
     * Fungsi helper (Tidak ada perubahan)
     */
    private function getPengadilanFromLokasi(string $lokasi, string $kategori, string $deskripsi): string
    {
        if ($kategori === 'TUN') return 'PTUN Pontianak';
        if ($kategori === 'PHI') return 'PHI Pontianak';

        $pengadilanMap = [
            'Kota Pontianak'  => 'PN Pontianak',
            'Kab. Kubu Raya'  => 'PN Mempawah',
            'Kota Singkawang' => 'PN Singkawang',
            'Kab. Mempawah'   => 'PN Mempawah',
            'Kab. Sanggau'    => 'PN Sanggau',
            'Kab. Ketapang'   => 'PN Ketapang',
            'Kab. Sambas'     => 'PN Sambas',
            'Kab. Landak'     => 'PN Ngabang'
        ];

        $pengadilan = $pengadilanMap[$lokasi] ?? 'PN Tidak Diketahui';

        if ($kategori === 'Perdata' && in_array($deskripsi, ['Gugatan Cerai', 'Gugatan Harta Gono-gini'])) {
            return str_replace('PN', 'PA', $pengadilan);
        }

        return $pengadilan;
    }
}
