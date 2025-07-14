{{-- /resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('title', 'About Our Firm - Danadyaksa 08 Law Firm')

@section('content')
    
    {{-- Padding updated to pt-32 pb-16 to clear the fixed navbar and add height --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">About Our Firm</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="about-content" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-left leading-relaxed text-gray-700 text-lg space-y-6">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 text-center">Committed to Justice, Driven by Excellence.</h2>
                <p>
                    <strong>[Placeholder for Firm History]</strong> - Danadyaksa 08 Law Firm was founded in [Year] with a clear mission: to provide exceptional legal representation with a client-focused approach...
                </p>
                <p>
                    <strong>Our Mission & Vision:</strong> Our mission is to deliver strategic, effective, and personalized legal solutions...
                </p>
                 <p>
                    <strong>Our Values:</strong> We operate on a foundation of integrity, transparency, and collaboration...
                </p>
            </div>
        </div>
    </section>

@endsection