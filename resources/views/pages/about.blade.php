{{-- /resources/views/pages/about.blade.php --}}
@extends('layouts.app')

@section('title', __('about.page_title'))
{{-- ADDED --}}
@section('description', __('about.meta_description'))

@section('content')
    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">{{ __('about.header_title') }}</h1>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section id="about-content" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-4 space-y-24">
            
            {{-- Original About Us Section --}}
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 text-center mb-12">{{ __('about.section_1_title') }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-start">
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('images/about-us-placeholder.jpg') }}" alt="{{ __('about.img_alt_1') }}" class="max-w-full h-auto rounded-2xl shadow-lg">
                    </div>
                    <div class="text-lg leading-relaxed text-gray-700 space-y-6">
                        <p>{!! __('about.section_1_p1') !!}</p>
                        <p>{{ __('about.section_1_p2') }}</p>
                        <p>{{ __('about.section_1_p3') }}</p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-200">

            {{-- Founders Section --}}
            <div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    {{-- Text Column --}}
                    <div class="text-lg leading-relaxed text-gray-700 space-y-6">
                        <h3 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('about.section_2_title') }}</h3>
                        <p>{{ __('about.section_2_p1') }}</p>
                        <p>{{ __('about.section_2_p2') }}</p>
                    </div>
                    {{-- Image Column --}}
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('images/founder.png') }}" alt="{{ __('about.img_alt_2') }}" class="max-w-full h-auto rounded-2xl shadow-lg">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection