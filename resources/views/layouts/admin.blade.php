<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Danadyaksa 08 Law Firm') }} - Admin</title>

        {{-- Menggunakan Font & Ikon yang sama dengan layout publik --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

        {{-- Memuat file CSS & JS utama dari Vite --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="antialiased text-gray-800">
        {{-- Wrapper ini memastikan layout mengisi layar dan footer selalu di bawah --}}
        <div class="min-h-screen flex flex-col bg-surface">
            
            {{-- Menggunakan navigasi khusus admin dari Breeze --}}
            @include('layouts.navigation')

            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="container mx-auto py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- Class "flex-grow" membuat konten utama mengisi ruang kosong --}}
            <main class="flex-grow">
                {{ $slot }}
            </main>
            
            {{-- Menggunakan footer yang sama dengan layout publik --}}
            @include('partials.footer')
        </div>

        {{-- Memuat script yang sama dengan layout publik --}}
        @stack('scripts')
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    </body>
</html>