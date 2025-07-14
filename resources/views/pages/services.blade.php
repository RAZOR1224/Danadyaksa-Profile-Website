{{-- /resources/views/pages/services.blade.php --}}
@extends('layouts.app')

@section('title', 'Practice Areas - Danadyaksa 08 Law Firm')

@section('content')

    {{-- Padding updated to pt-32 pb-16 to clear the fixed navbar and add height --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Our Practice Areas</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="services-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">We offer a comprehensive suite of legal services designed to address the diverse challenges faced by modern businesses.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                {{-- Service items... --}}
            </div>
        </div>
    </section>

@endsection