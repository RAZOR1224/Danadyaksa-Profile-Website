@extends('layouts.app')

@section('title', __('contact.page_title'))

@section('content')

    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">{{ __('contact.header_title') }}</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="contact-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto">
                    {{ __('contact.subtitle') }}
                </p>
            </div>

            <div class="flex flex-wrap -mx-4">
                {{-- Contact Form --}}
                <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
                    
                    {{-- Pesan Sukses --}}
                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Success</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif

                    {{-- Pesan Error Validasi --}}
                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
                            <p class="font-bold">Oops!</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('contact.submit', app()->getLocale()) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
                        @csrf
                        <div class="mb-4 text-left">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('contact.form_name') }}</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4 text-left">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('contact.form_email') }}</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-6 text-left">
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">{{ __('contact.form_message') }}</label>
                            <textarea id="message" name="message" rows="5" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ old('message') }}</textarea>
                        </div>
                        <button type="submit" class="bg-primary hover:bg-primaryDark text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105 w-full">{{ __('contact.form_button') }}</button>
                    </form>
                </div>

                {{-- Contact Information --}}
                <div class="w-full lg:w-1/2 px-4">
                    <div class="bg-white p-8 rounded-lg shadow-md h-full flex flex-col">
                        <h3 class="text-2xl font-bold text-gray-900 mb-6">{{ __('contact.info_title') }}</h3>
                        <div class="space-y-4 text-gray-700">
                            <p class="flex items-start"><i class="fas fa-map-marker-alt mt-1 mr-4 text-primary"></i><span>Jl. Parit Haji Muksin II, Komplek Telagah Indah No. 8,<br>Sungai Raya, Kab. Kubu Raya, Kalimantan Barat 78121</span></p>
                            <p class="flex items-start"><i class="fas fa-phone-alt mt-1 mr-4 text-primary"></i><span>085821384559 / 082150308772</span></p>
                            <p class="flex items-start"><i class="fas fa-envelope mt-1 mr-4 text-primary"></i><span>danadyakasalawfirm@gmail.com</span></p>
                            <p class="flex items-start"><i class="fas fa-clock mt-1 mr-4 text-primary"></i><span>{{ __('contact.info_hours') }}</span></p>
                        </div>
                        <div class="mt-auto pt-6 h-64 md:h-auto">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.818985177821!2d109.35515237597148!3d-0.08985299994681622!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5a7d747372c3%3A0x803a61f122703ab3!2sDANADYAKSA%2008%20LAW%20FIRM!5e0!3m2!1sen!2sid!4v1722151608240!5m2!1sen!2sid" 
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="rounded-md">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection