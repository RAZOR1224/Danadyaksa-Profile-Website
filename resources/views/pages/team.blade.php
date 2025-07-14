{{-- /resources/views/pages/team.blade.php --}}
@extends('layouts.app')

@section('title', 'Our Team - Danadyaksa 08 Law Firm')

@section('content')

    {{-- Padding updated to pt-32 pb-16 to clear the fixed navbar and add height --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Meet Our Legal Experts</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="team-content" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">Our strength lies in our team of dedicated and experienced legal professionals who are committed to achieving the best results for our clients.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Lawyer profiles... --}}
            </div>
        </div>
    </section>

@endsection