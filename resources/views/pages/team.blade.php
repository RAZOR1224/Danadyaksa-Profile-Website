{{-- /resources/views/pages/team.blade.php --}}
@extends('layouts.app')

@section('title', 'Our Team - Danadyaksa 08 Law Firm')

@section('content')

    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Meet Our Legal Experts</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="team-content" class="py-16 md:py-24 bg-surface overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-lg text-gray-600 mb-12 max-w-2xl mx-auto">Our strength lies in our team of dedicated and experienced legal professionals who are committed to achieving the best results for our clients.</p>
            </div>
            
            <div class="swiper team-swiper">
                <div class="swiper-wrapper pb-16">
                    
                    @foreach ($teamMembers as $member)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-lg shadow-lg p-6 text-center h-full flex flex-col">
                                <img src="{{ $member->image ? asset('storage/' . $member->image) : asset('images/team-member-placeholder.jpg') }}" alt="{{ $member->full_name }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover">
                                <h3 class="text-xl font-bold text-gray-900">{{ $member->full_name }}</h3>
                                <p class="text-primary font-semibold mb-3">{{ $member->position }}</p>
                                <p class="text-gray-600 text-sm flex-grow">
                                    {{ $member->description }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev text-primary"></div>
                <div class="swiper-button-next text-primary"></div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
{{-- This script initializes the SwiperJS carousel --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiper = new Swiper('.team-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            breakpoints: {
                768: { slidesPerView: 2, spaceBetween: 30 },
                1024: { slidesPerView: 3, spaceBetween: 40 }
            },
            pagination: { el: '.swiper-pagination', clickable: true },
            navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
        });
    });
</script>
@endpush