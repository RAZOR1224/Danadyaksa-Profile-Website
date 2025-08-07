{{-- /resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- CHANGED: Improved title structure for SEO and added a default title. --}}
    <title>@yield('title', 'Professional Legal Services') | {{ config('app.name', 'Danadyaksa 08 Law Firm') }}</title>

    {{-- ADDED: Dynamic meta description for SEO. This is very important. --}}
    <meta name="description" content="@yield('description', 'Danadyaksa 08 Law Firm offers expert legal consultation, litigation, and corporate legal services in Banjarmasin, South Kalimantan. Contact our professional team today.')">

    {{-- Favicon Links --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">

    {{-- Fonts & Icons --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Scripts & Styles --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="antialiased text-gray-800">

    <div class="fixed top-0 left-0 right-0 z-50">
        @include('partials.top-bar')
        @include('partials.header')
    </div>
    
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Scripts --}}
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>

</body>
</html>