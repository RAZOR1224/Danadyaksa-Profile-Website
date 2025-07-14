{{-- /resources/views/pages/articles.blade.php --}}
@extends('layouts.app')

@section('title', 'Articles - Legal Insights from Danadyaksa 08')

@section('content')

    {{-- Padding updated to pt-32 pb-16 to clear the fixed navbar and add height --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Legal Articles & Insights</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="articles-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay informed with the latest analysis and commentary on legal developments from our expert team.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Article cards... --}}
            </div>

            <div class="mt-16 text-center">
                {{-- Pagination... --}}
            </div>
        </div>
    </section>

@endsection