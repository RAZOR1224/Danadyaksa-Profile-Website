{{-- /resources/views/pages/contact.blade.php --}}

@extends('layouts.app')

@section('title', 'Contact Us - Danadyaksa 08 Law Firm')

@section('content')

    {{-- Padding updated to pt-32 pb-16 to clear the fixed navbar and add height --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Get In Touch</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="contact-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <p class="text-lg text-gray-700 mb-10 max-w-2xl mx-auto">
                    We invite you to reach out for a confidential consultation. Let us know how we can help.
                </p>
            </div>

            <div class="flex flex-wrap -mx-4">
                {{-- Contact Form --}}
                <div class="w-full lg:w-1/2 px-4 mb-8 lg:mb-0">
                    <form action="{{ route('contact.submit', app()->getLocale()) }}" method="POST" class="bg-white p-8 rounded-lg shadow-md">
                        @csrf
                        <div class="mb-4 text-left">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Full Name:</label>
                            <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-4 text-left">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address:</label>
                            <input type="email" id="email" name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        </div>
                        <div class="mb-6 text-left">
                            <label for="message" class="block text-gray-700 text-sm font-bold mb-2">How can we help you?</label>
                            <textarea id="message" name="message" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                        </div>
                        <button type="submit" class="bg-primary hover:bg-primaryDark text-white font-bold py-3 px-6 rounded-full transition duration-300 ease-in-out transform hover:scale-105 w-full">Send Inquiry</button>
                    </form>
                </div>

                {{-- Contact Information --}}
                <div class="w-full lg:w-1/2 px-4">
                    <div class="bg-white p-8 rounded-lg shadow-md h-full">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Office</h3>
                        <div class="space-y-4 text-gray-700">
                            <p><i class="fas fa-map-marker-alt mr-3 text-primary"></i>[Your Street Address], [City], [Postal Code]</p>
                            <p><i class="fas fa-phone-alt mr-3 text-primary"></i>[Your Phone Number]</p>
                            <p><i class="fas fa-envelope mr-3 text-primary"></i>[Your Email Address]</p>
                            <p><i class="fas fa-clock mr-3 text-primary"></i>Monday - Friday: 9:00 AM - 5:00 PM</p>
                        </div>
                        <div class="mt-6 h-48 bg-gray-200 rounded-md flex items-center justify-center text-gray-500">
                            Map Placeholder
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection