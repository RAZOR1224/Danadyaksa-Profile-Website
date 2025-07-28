{{-- /resources/views/pages/services.blade.php --}}
@extends('layouts.app')

@section('title', __('services.page_title'))

@section('content')

    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">{{ __('services.header_title') }}</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="services-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4 text-center">
            <p class="text-lg text-gray-600 mb-12 max-w-3xl mx-auto">{{ __('services.subtitle') }}</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                
                {{-- Service Card: Litigasi --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_1_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_1_desc') }}</p>
                </div>

                {{-- Service Card: Non Litigasi --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_2_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_2_desc') }}</p>
                </div>

                {{-- Service Card: In House Training --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_3_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_3_desc') }}</p>
                </div>

                {{-- Service Card: Sosialisasi --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_4_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_4_desc') }}</p>
                </div>

                {{-- Service Card: Legal Drafting --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_5_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_5_desc') }}</p>
                </div>

                {{-- Service Card: Legal Opinion --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_6_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_6_desc') }}</p>
                </div>

                {{-- Service Card: Riset --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_7_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_7_desc') }}</p>
                </div>

                {{-- Service Card: Konsultasi --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_8_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_8_desc') }}</p>
                </div>

                {{-- Service Card: Arbitrase --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_9_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_9_desc') }}</p>
                </div>
                
                {{-- Service Card: Advokasi Kebijakan --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_10_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_10_desc') }}</p>
                </div>

                {{-- Service Card: Risalah Kebijakan --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_11_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_11_desc') }}</p>
                </div>

                {{-- Service Card: Mediasi --}}
                <div class="bg-white p-8 rounded-lg shadow-lg text-left transform hover:-translate-y-2 transition-transform duration-300">
                    <h3 class="text-2xl font-bold text-primary mb-3">{{ __('services.card_12_title') }}</h3>
                    <p class="text-gray-600">{{ __('services.card_12_desc') }}</p>
                </div>

            </div>
        </div>
    </section>

@endsection