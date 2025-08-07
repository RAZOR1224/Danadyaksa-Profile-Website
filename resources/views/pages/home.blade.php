@extends('layouts.app')

@section('title', 'Expert Legal Services in Banjarmasin | Danadyaksa 08 Law Firm')
@section('description', 'Danadyaksa 08 Law Firm offers expert legal consultation, litigation, and corporate legal services in Banjarmasin, South Kalimantan. Contact our professional team today.')


@section('content')

    {{-- 1. Hero Section --}}
    <section id="home" class="relative text-white h-screen flex items-center text-left px-8 md:px-16 lg:px-24">
        <img src="{{ asset('images/hero-background.png') }}" alt="A professional legal setting or cityscape" class="absolute inset-0 w-full h-full object-cover z-0">
        <div class="absolute inset-0 bg-black opacity-60 z-0"></div>
        
        <div class="relative z-10 max-w-4xl animate-fade-in-up">
            <p class="text-lg font-semibold tracking-widest text-gray-300 mb-2">{{ __('home.hero_greeting') }}</p>
            <h1 class="text-5xl md:text-6xl font-bold mb-4">{{ __('home.hero_title') }}</h1>
            <p class="text-xl md:text-2xl mb-8 max-w-3xl">{{ __('home.hero_subtitle') }}</p>
            <a href="#contact" class="bg-accent text-primary hover:bg-yellow-500 px-8 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105">
                {{ __('home.hero_button') }}
            </a>
        </div>
    </section>

    {{-- 2. About Us Section --}}
    <section id="about" class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <p class="text-sm font-semibold text-accent tracking-widest uppercase mb-2">{{ __('home.about_eyebrow') }}</p>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('home.about_title') }}</h2>
                    <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                        <p>{!! __('home.about_p1') !!}</p>
                        <p>{!! __('home.about_p2') !!}</p>
                    </div>
                    <a href="{{ route('about', app()->getLocale()) }}" class="mt-6 inline-block bg-primary text-white hover:bg-primaryDark px-8 py-3 rounded-full font-semibold transition-colors">
                        {{ __('home.about_button') }}
                    </a>
                </div>
                <div class="hidden md:block">
                    <img src="{{ asset('images/about-us.png') }}" alt="Our law firm office" class="rounded-lg shadow-lg w-full h-full object-cover">
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Practice Areas Accordion Section --}}
    <section id="services" class="bg-surface py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('home.services_title') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('home.services_subtitle') }}</p>
            </div>
            
            <div x-data="{ openAccordion: 1 }" class="max-w-3xl mx-auto">
                {{-- Item 1 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 1 ? null : 1" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_1_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 1 }"></i>
                    </button>
                    <div x-show="openAccordion === 1" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_1_desc') }}</p></div></div>
                </div>
                {{-- Item 2 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 2 ? null : 2" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_2_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 2 }"></i>
                    </button>
                    <div x-show="openAccordion === 2" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_2_desc') }}</p></div></div>
                </div>
                {{-- Item 3 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 3 ? null : 3" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_3_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 3 }"></i>
                    </button>
                    <div x-show="openAccordion === 3" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_3_desc') }}</p></div></div>
                </div>
                {{-- Item 4 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 4 ? null : 4" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_4_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 4 }"></i>
                    </button>
                    <div x-show="openAccordion === 4" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_4_desc') }}</p></div></div>
                </div>
                {{-- Item 5 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 5 ? null : 5" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_5_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 5 }"></i>
                    </button>
                    <div x-show="openAccordion === 5" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_5_desc') }}</p></div></div>
                </div>
                {{-- Item 6 --}}
                <div class="border-b">
                    <button @click="openAccordion = openAccordion === 6 ? null : 6" class="w-full flex justify-between items-center py-4 px-2 text-left">
                        <span class="text-xl font-semibold text-gray-800">{{ __('home.service_6_title') }}</span>
                        <i class="fas fa-chevron-down transition-transform" :class="{ 'rotate-180': openAccordion === 6 }"></i>
                    </button>
                    <div x-show="openAccordion === 6" x-collapse><div class="p-4 pt-0 text-gray-700"><p>{{ __('home.service_6_desc') }}</p></div></div>
                </div>
            </div>
            <div class="mt-12 text-center">
                <a href="{{ route('services', app()->getLocale()) }}" class="bg-primary text-white hover:bg-primaryDark px-8 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105">
                    {{ __('home.services_button') }}
                </a>
            </div>
        </div>
    </section>
    
    {{-- 4. Why Choose Us Section --}}
    <section class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('home.why_title') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('home.why_subtitle') }}</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="text-center p-4">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary mx-auto mb-4">
                        <i class="fas fa-check-circle text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('home.why_1_title') }}</h3>
                    <p class="text-gray-600">{{ __('home.why_1_desc') }}</p>
                </div>
                <div class="text-center p-4">
                    <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary mx-auto mb-4">
                        <i class="fas fa-trophy text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('home.why_2_title') }}</h3>
                    <p class="text-gray-600">{{ __('home.why_2_desc') }}</p>
                </div>
                <div class="text-center p-4">
                     <div class="flex items-center justify-center h-16 w-16 rounded-full bg-surface text-primary mx-auto mb-4">
                        <i class="fas fa-handshake text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('home.why_3_title') }}</h3>
                    <p class="text-gray-600">{{ __('home.why_3_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

{{-- 5. Trusted By / Client Logos --}}
<section class="bg-surface py-12">
    <div class="container mx-auto">
        <h3 class="text-center text-2xl font-bold text-gray-800 mb-12 px-4">{{ __('home.trusted_title') }}</h3>
        
        <div class="swiper logo-swiper overflow-hidden">
            <div class="swiper-wrapper items-center">

                {{-- The height of each slide has been increased to h-24 to make logos bigger --}}
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-1.png') }}" alt="Client Logo 1" class="max-h-full max-w-full object-contain">
                </div>
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-2.png') }}" alt="Client Logo 2" class="max-h-full max-w-full object-contain">
                </div>
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-3.png') }}" alt="Client Logo 3" class="max-h-full max-w-full object-contain">
                </div>
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-4.png') }}" alt="Client Logo 4" class="max-h-full max-w-full object-contain">
                </div>
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-5.png') }}" alt="Client Logo 5" class="max-h-full max-w-full object-contain">
                </div>
                
                {{-- Duplicated slides for a seamless loop --}}
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-1.png') }}" alt="Client Logo 1" class="max-h-full max-w-full object-contain">
                </div>
                <div class="swiper-slide h-24 flex justify-center items-center">
                    <img src="{{ asset('images/logo-placeholder-2.png') }}" alt="Client Logo 2" class="max-h-full max-w-full object-contain">
                </div>

            </div>
        </div>
    </div>
</section>

    {{-- 6. Location / Map Section --}}
    <section id="location" class="bg-white py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('home.location_title') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('home.location_subtitle') }}</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8 items-center">
                <div class="md:col-span-1 text-center md:text-left">
                    <h3 class="font-bold text-xl mb-2">{{ __('home.location_address_title') }}</h3>
                    <p class="text-gray-700 leading-relaxed">{!! __('home.location_address_details') !!}</p>
                    <a href="https://www.google.com/maps/search/?api=1&query=Jl.+Parit+H.+Muksin+II+Komplek+Telaga+Indah+No.8%2C+Sungai+Raya%2C+Kec.+Sungai+Raya%2C+Kabupaten+Kubu+Raya%2C+Kalimantan+Barat+78121" target="_blank" class="mt-4 inline-block bg-primary text-white hover:bg-primaryDark px-6 py-2 rounded-full font-semibold transition-colors">
                        {{ __('home.location_button') }}
                    </a>
                </div>
                <div class="md:col-span-2 h-96 rounded-lg overflow-hidden shadow-lg">
                    <iframe src="https://maps.google.com/maps?q=Jl.%20Parit%20H.%20Muksin%20II%20Komplek%20Telaga%20Indah%20No.8%2C%20Sungai%20Raya%2C%20Kec.%20Sungai%20Raya%2C%20Kabupaten%20Kubu%20Raya%2C%20Kalimantan%20Barat%2078121&t=&z=15&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    {{-- 7. Contact Form Section --}}
    <section id="contact" class="bg-surface py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('home.contact_title') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('home.contact_subtitle') }}</p>
            </div>
            <form action="{{ route('contact.submit', app()->getLocale()) }}" method="POST" class="max-w-2xl mx-auto">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('home.contact_name') }}</label>
                        <input type="text" name="name" id="name" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('home.contact_email') }}</label>
                        <input type="email" name="email" id="email" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                    </div>
                </div>
                <div class="mb-6">
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('home.contact_subject') }}</label>
                    <input type="text" name="subject" id="subject" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary">
                </div>
                <div class="mb-6">
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('home.contact_message') }}</label>
                    <textarea name="message" id="message" rows="5" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-primary focus:border-primary"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-primary text-white hover:bg-primaryDark px-10 py-3 rounded-full text-lg font-semibold transition duration-300 ease-in-out transform hover:scale-105">
                        {{ __('home.contact_button') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- This script enables the smooth collapse/expand animation for the accordion --}}
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    
    {{-- CORRECTED SCRIPT for the logo carousel --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.logo-swiper', {
                loop: true,
                // How much space is between the logos
                spaceBetween: 30,
                // Continuously scroll
                autoplay: {
                    delay: 1,
                    disableOnInteraction: false,
                },
                speed: 4000,
                grabCursor: true,

                // --- FIXED ---
                // Set how many logos to show at once for different screen sizes
                slidesPerView: 3, // For mobile screens
                breakpoints: {
                    // when window width is >= 640px
                    640: {
                      slidesPerView: 4,
                      spaceBetween: 40
                    },
                    // when window width is >= 1024px
                    1024: {
                      slidesPerView: 5,
                      spaceBetween: 50
                    }
                }
            });
        });
    </script>
@endpush