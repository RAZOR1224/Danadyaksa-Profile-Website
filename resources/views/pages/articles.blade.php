{{-- /resources/views/pages/articles.blade.php --}}
@extends('layouts.app')

@section('title', 'Articles - Legal Insights from Danadyaksa 08')

@section('content')

    {{-- Header Section --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4">
            <h1 class="text-4xl md:text-5xl font-bold">Legal Articles & Insights</h1>
        </div>
    </section>

    {{-- Main content section --}}
    <section id="articles-content" class="py-16 md:py-24 bg-surface">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Stay informed with the latest analysis and commentary on legal developments from our expert team.</p>
            </div>

            {{-- Article Card Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                @forelse ($articles as $article)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300">
                        <a href="#" class="block">
                            {{-- Tampilkan gambar jika ada, jika tidak, tampilkan placeholder --}}
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : asset('images/article-placeholder-1.jpg') }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                        </a>
                        <div class="p-6 flex flex-col flex-grow">
                            <p class="text-primary font-semibold text-sm mb-2">Legal Update</p>
                            <h3 class="text-xl font-bold text-gray-900 mb-3 flex-grow">
                                <a href="#" class="hover:text-primary">{{ $article->title }}</a>
                            </h3>
                            <p class="text-gray-600 text-sm mb-4">
                                {{-- Menampilkan ringkasan konten --}}
                                {{ Str::limit(strip_tags($article->content), 120) }}
                            </p>
                            <div class="text-xs text-gray-500 mt-auto">
                                {{-- Menampilkan nama penulis dari relasi 'user' --}}
                                <span>By {{ $article->user->name }}</span> &bull; <span>{{ $article->created_at->format('F d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="md:col-span-2 lg:col-span-3 text-center text-gray-500">No articles found.</p>
                @endforelse
                
            </div>

            {{-- Pagination Links --}}
            <div class="mt-16">
                {{ $articles->links() }}
            </div>
        </div>
    </section>

@endsection