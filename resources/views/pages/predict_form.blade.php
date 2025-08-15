{{-- /resources/views/pages/predict_form.blade.php --}}

@extends('layouts.app')

@section('title', 'Kalkulator Estimasi Durasi Perkara')
@section('description', 'Dapatkan estimasi durasi penyelesaian perkara hukum Anda dengan menjawab beberapa pertanyaan singkat melalui kalkulator interaktif kami.')

@section('content')

    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Kalkulator Estimasi Durasi Perkara</h1>
            <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">Jawab beberapa pertanyaan singkat untuk mendapatkan perkiraan penyelesaian kasus Anda.</p>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="prediction-content" class="py-16 md:py-24 bg-surface">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative" role="alert">
                            <strong class="font-bold">Oops! Terjadi kesalahan input.</strong>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('api_error'))
                        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg" role="alert">
                            {{ session('api_error') }}
                        </div>
                    @endif

                    <form id="predict-form" action="{{ route('predict.submit', app()->getLocale()) }}" method="POST" class="space-y-8">
                        @csrf

                        <div id="step-1" class="step">
                            <label class="block text-gray-800 font-bold mb-4 text-xl text-center">Secara umum, masalah hukum Anda berkaitan dengan apa?</label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <button type="button" class="category-button text-left p-4 border border-gray-300 rounded-lg hover:bg-gray-100 hover:border-primary transition duration-300" data-category="Perdata">
                                    <h3 class="font-bold text-lg text-primary">Perdata</h3>
                                    <p class="text-sm text-gray-600">Masalah pribadi, bisnis, keluarga.</p>
                                </button>
                                <button type="button" class="category-button text-left p-4 border border-gray-300 rounded-lg hover:bg-gray-100 hover:border-primary transition duration-300" data-category="Pidana">
                                    <h3 class="font-bold text-lg text-primary">Pidana</h3>
                                    <p class="text-sm text-gray-600">Korban atau tersangka kejahatan.</p>
                                </button>
                                <button type="button" class="category-button text-left p-4 border border-gray-300 rounded-lg hover:bg-gray-100 hover:border-primary transition duration-300" data-category="PHI">
                                    <h3 class="font-bold text-lg text-primary">Ketenagakerjaan (PHI)</h3>
                                    <p class="text-sm text-gray-600">Masalah terkait pekerjaan.</p>
                                </button>
                                <button type="button" class="category-button text-left p-4 border border-gray-300 rounded-lg hover:bg-gray-100 hover:border-primary transition duration-300" data-category="TUN">
                                    <h3 class="font-bold text-lg text-primary">Tata Usaha Negara (TUN)</h3>
                                    <p class="text-sm text-gray-600">Sengketa melawan pejabat.</p>
                                </button>
                            </div>
                            <input type="hidden" id="kategori_perkara" name="kategori_perkara" required>
                        </div>

                        <div id="step-details" class="step space-y-6" style="display: none;">
                            <label class="block text-gray-800 font-bold mb-4 text-xl text-center">Baik, mari kita rinci lebih lanjut.</label>

                            {{-- Input Fields --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                @php
                                    $selectClass = "mt-1 block w-full rounded-lg border-2 border-gray-300 py-3 px-4 text-base shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 transition";
                                @endphp
                                <div>
                                    <label for="deskripsi_perkara" class="block text-sm font-medium text-gray-700">Spesifik Masalah yang Anda Hadapi</label>
                                    <select id="deskripsi_perkara" name="deskripsi_perkara" required class="{{ $selectClass }}"></select>
                                </div>
                                <div>
                                    <label for="subjek_hukum_lawan" class="block text-sm font-medium text-gray-700">Siapa Pihak Lawan Anda?</label>
                                    <select id="subjek_hukum_lawan" name="subjek_hukum_lawan" required class="{{ $selectClass }}"></select>
                                </div>
                                <div>
                                    <label for="lokasi_sengketa" class="block text-sm font-medium text-gray-700">Domisili Anda Saat Ini</label>
                                    <select id="lokasi_sengketa" name="lokasi_sengketa" required class="{{ $selectClass }}">
                                        <option value="" disabled selected>Pilih domisili Anda</option>
                                        <option>Kota Pontianak</option> <option>Kab. Kubu Raya</option> <option>Kota Singkawang</option> <option>Kab. Mempawah</option> <option>Kab. Sanggau</option> <option>Kab. Ketapang</option> <option>Kab. Sambas</option> <option>Kab. Landak</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="status_bukti_awal" class="block text-sm font-medium text-gray-700">Kelengkapan Bukti Awal</label>
                                    <select id="status_bukti_awal" name="status_bukti_awal" required class="{{ $selectClass }}">
                                        <option value="" disabled selected>Pilih kelengkapan bukti</option>
                                        <option value="Lengkap">Lengkap (Dokumen utama, saksi kunci ada)</option>
                                        <option value="Sebagian">Sebagian (Beberapa dokumen/saksi ada)</option>
                                        <option value="Tidak Ada">Tidak Ada (Baru akan memulai mengumpulkan)</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="tahapan_hukum" class="block text-sm font-medium text-gray-700">Kasus Anda Sudah Sampai Jenjang?</label>
                                    <select id="tahapan_hukum" name="tahapan_hukum" required class="{{ $selectClass }}">
                                        <option value="" disabled selected>Pilih tahapan kasus</option>
                                        <option value="Mediasi">Mediasi (Jika tidak ingin lanjut ke ranah hukum)</option>
                                        <option value="Tingkat Pertama">Tingkat Pertama (Umumnya kasus dimulai dari sini)</option>
                                        <option value="Banding">Banding</option>
                                        <option value="Kasasi">Kasasi</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="kompleksitas_perkara" class="block text-sm font-medium text-gray-700">Kompleksitas Pembuktian Kasus Anda</label>
                                    <select id="kompleksitas_perkara" name="kompleksitas_perkara" required class="{{ $selectClass }}">
                                        <option value="" disabled selected>Pilih kompleksitas kasus</option>
                                        <option value="Sederhana">Sederhana (bukti & saksi minim)</option>
                                        <option value="Menengah">Menengah (beberapa saksi/ahli)</option>
                                        <option value="Kompleks">Kompleks (banyak saksi/audit)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-8 text-center">
                                <button type="submit" class="bg-primary hover:bg-primaryDark text-white font-bold py-3 px-8 rounded-lg shadow-md transition duration-300">
                                    <i class="fas fa-calculator mr-2"></i> Prediksi Sekarang
                                </button>
                            </div>
                        </div>

                        <input type="hidden" name="subjek_hukum_klien" value="Individu">
                        <input type="hidden" name="jalur_penyelesaian" value="Litigasi">
                        <input type="hidden" name="hasil_akhir" value="Menang">
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
{{-- JavaScript digabungkan langsung ke dalam file blade --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // --- Definisi Elemen DOM ---
    const step1 = document.getElementById('step-1');
    const stepDetails = document.getElementById('step-details');
    const categoryButtons = document.querySelectorAll('.category-button');

    // Input Form
    const inputKategoriPerkara = document.getElementById('kategori_perkara');
    const deskripsiSelect = document.getElementById('deskripsi_perkara');
    const lawanSelect = document.getElementById('subjek_hukum_lawan');

    // --- Data untuk Dropdown Dinamis ---
    const deskripsiData = {
        Perdata: ['Gugatan Cerai', 'Gugatan Harta Gono-gini', 'Sengketa Lahan', 'Sengketa Waris', 'Wanprestasi', 'Sengketa Utang Piutang'],
        Pidana: ['Pencurian', 'Penggelapan', 'Penipuan', 'Narkotika', 'Penganiayaan', 'Penggelapan dalam Jabatan'],
        PHI: ['Perselisihan Hak', 'Perselisihan PHK', 'Perselisihan Kepentingan'],
        TUN: ['Sengketa Kepegawaian', 'Sengketa Izin', 'Sengketa Lelang Proyek']
    };

    const lawanData = {
        Perdata: ['Individu', 'Perusahaan'],
        Pidana: ['Jaksa Penuntut Umum'],
        PHI: ['Perusahaan', 'Serikat Pekerja'],
        TUN: ['Pemerintah', 'Badan Usaha Milik Negara']
    };

    // --- Validasi Elemen ---
    if (!step1 || !stepDetails || categoryButtons.length === 0) {
        console.error("Error: Elemen langkah (step-1, step-details) atau tombol kategori tidak ditemukan. Periksa ID di file blade.");
        return;
    }

    // --- Event Listener ---
    categoryButtons.forEach(button => {
        button.addEventListener('click', function () {
            const selectedCategory = this.dataset.category;

            if (inputKategoriPerkara) {
                inputKategoriPerkara.value = selectedCategory;
            }

            updateDetailDropdowns(selectedCategory);

            step1.style.display = 'none';
            stepDetails.style.display = 'block';
        });
    });

    // --- Fungsi Helper ---
    function updateDetailDropdowns(category) {
        if (!deskripsiSelect || !lawanSelect) return;

        deskripsiSelect.innerHTML = '';
        lawanSelect.innerHTML = '';

        deskripsiSelect.add(new Option('Pilih Spesifik Masalah...', '', true, true));
        lawanSelect.add(new Option('Pilih Pihak Lawan...', '', true, true));
        deskripsiSelect.options[0].disabled = true;
        lawanSelect.options[0].disabled = true;

        if (deskripsiData[category]) {
            deskripsiData[category].forEach(item => deskripsiSelect.add(new Option(item, item)));
        }
        if (lawanData[category]) {
            lawanData[category].forEach(item => lawanSelect.add(new Option(item, item)));
        }
    }
});
</script>
@endpush
