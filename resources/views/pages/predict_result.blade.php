{{-- /resources/views/pages/predict_result.blade.php --}}

{{-- CHANGED: Mengganti layout component dengan @extends agar sesuai struktur --}}
@extends('layouts.app')

{{-- ADDED: Menambahkan title dan description untuk konsistensi dan SEO --}}
@section('title', 'Hasil Prediksi Durasi Perkara')
@section('description', 'Lihat hasil estimasi durasi penyelesaian perkara hukum Anda berdasarkan data yang telah Anda masukkan.')

@section('content')

    {{-- ADDED: Header Section yang konsisten dengan halaman lain --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Hasil Estimasi Anda</h1>
            <p class="mt-4 text-lg text-gray-200 max-w-2xl mx-auto">Berdasarkan data yang Anda berikan, berikut adalah perkiraan lama penyelesaian perkara.</p>
        </div>
    </section>

    {{-- ADDED: Main content section dengan background yang sesuai --}}
    <section id="result-content" class="py-16 md:py-24 bg-surface">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            {{-- CHANGED: Menghapus style dark mode dan menggunakan style yang konsisten --}}
            <div class="bg-white overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 md:p-8">

                    <div class="text-center">
                        {{-- CHANGED: Mengubah warna ikon agar sesuai dengan tema --}}
                        <svg class="mx-auto mb-4 w-16 h-16 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Prediksi Berhasil Dibuat!</h1>
                        <p class="text-gray-600 mb-8">Berikut adalah hasil estimasi berdasarkan jawaban Anda.</p>
                    </div>

                    {{-- CHANGED: Menyesuaikan kotak hasil dengan color palette baru --}}
                    <div class="bg-primary/10 border border-primary/20 rounded-lg p-6 text-center">
                        <p class="text-lg text-gray-700 mb-1">Estimasi Durasi Penyelesaian</p>
                        <p class="text-4xl md:text-5xl font-extrabold text-primaryDark">{{ $prediction['estimasi_penyelesaian_hari'] ?? 'N/A' }} Hari</p>
                        <p class="text-xl text-gray-600 mt-1">(Sekitar {{ $prediction['estimasi_penyelesaian_bulan'] ?? 'N/A' }} Bulan)</p>
                    </div>

                    <div class="mt-8 border-t border-gray-200 pt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Ringkasan Kasus Anda:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-6 gap-y-4 text-sm">
                            {{-- Helper untuk menampilkan data dengan rapi --}}
                            @php
                                function display_summary_item($label, $value) {
                                    echo '<div>
                                            <span class="text-gray-500">' . $label . ':</span>
                                            <strong class="font-medium text-gray-800 ml-2">' . ($value ?? 'Tidak ada Data') . '</strong>
                                        </div>';
                                }
                            @endphp

                            {{-- CHANGED: Menggunakan helper untuk kode yang lebih bersih --}}
                            {!! display_summary_item('Kategori Perkara', $input['kategori_perkara'] ?? null) !!}
                            {!! display_summary_item('Spesifik Masalah', $input['deskripsi_perkara'] ?? null) !!}
                            {!! display_summary_item('Pihak Lawan', $input['subjek_hukum_lawan'] ?? null) !!}
                            {!! display_summary_item('Lokasi Perkara', $input['lokasi_sengketa'] ?? null) !!}
                            {!! display_summary_item('Kelengkapan Bukti', $input['status_bukti_awal'] ?? null) !!}
                            {!! display_summary_item('Tahapan Hukum', $input['tahapan_hukum'] ?? null) !!}
                            {!! display_summary_item('Kompleksitas Perkara', $input['kompleksitas_perkara'] ?? null) !!}
                        </div>
                    </div>

                    {{-- CHANGED: Menyesuaikan kotak disclaimer --}}
                    <div class="mt-8 bg-amber-50 border border-amber-200 text-amber-800 p-4 rounded-lg text-sm text-left">
                        <p><strong class="font-bold">Penting:</strong> Hasil ini adalah estimasi berdasarkan data historis dan bukan merupakan jaminan. Durasi penyelesaian kasus dapat bervariasi tergantung pada banyak faktor tak terduga. Untuk analisa yang lebih akurat, silakan hubungi tim kami.</p>
                    </div>

                    <div class="mt-8 text-center">
                        {{-- CHANGED: Menyesuaikan tombol kembali --}}
                        <a href="{{ route('service-estimation-time', app()->getLocale()) }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300">
                            <i class="fas fa-arrow-left mr-2"></i> Coba Prediksi Lain
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
