@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <section class="bg-primary pt-32 pb-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-white">
                Dashboard
            </h1>
        </div>
    </section>

    {{-- Main Dashboard Content --}}
    <section class="pb-16 md:pb-24 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    Welcome back, **{{ Auth::user()->name }}**!
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-500">Total Articles</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Article::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-500">Total Team Members</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Team::count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-lg font-semibold text-gray-500">Contact Messages</h3>
                    <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Contact::count() }}</p>
                </div>
            </div>

            {{-- Quick Actions --}}
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="flex flex-col md:flex-row gap-4">
                        <a href="{{ route('admin.articles.index') }}" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-3 px-4 rounded-lg text-center transition-colors">
                            Manage Articles
                        </a>
                        <a href="{{ route('admin.teams.index') }}" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-3 px-4 rounded-lg text-center transition-colors">
                            Manage Team Members
                        </a>
                        {{-- TAMBAHKAN TOMBOL BARU INI --}}
                        <a href="{{ route('admin.contacts.index') }}" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-3 px-4 rounded-lg text-center transition-colors">
                            View Inquiries
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection