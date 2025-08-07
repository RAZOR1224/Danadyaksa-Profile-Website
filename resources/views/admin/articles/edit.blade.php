@extends('layouts.app')
@section('title', __('admin.articles_edit'))
@section('content')
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">{{ __('admin.articles_edit') }}</h1>
        </div>
    </section>
    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            {{-- BREADCRUMB --}}
            <div class="mb-6 text-sm">
                <a href="{{ route('dashboard') }}" class="font-medium text-gray-500 hover:text-primary">Dashboard</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <a href="{{ route('admin.articles.index') }}" class="font-medium text-gray-500 hover:text-primary">{{ __('admin.articles_manage') }}</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <span class="text-gray-700">{{ __('admin.articles_edit') }}</span>
            </div>

    {{-- Konten Utama Halaman --}}
    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    
                    {{-- Form untuk mengedit artikel --}}
                    <form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        @if ($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-6" role="alert">
                                <strong class="font-bold">Oops!</strong>
                                <span class="block sm:inline">There were some problems with your input.</span>
                                <ul class="mt-3 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{-- Input Judul --}}
                        <div class="mb-6">
                            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>

                        {{-- Input Konten --}}
                        <div class="mb-6">
                            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="10" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('content', $article->content) }}</textarea>
                        </div>

                        {{-- Input Gambar --}}
                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Change Image (Optional)</label>
                            <input type="file" name="image" id="image" class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100">
                            @if ($article->image)
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500">Current Image:</p>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-20 w-auto rounded mt-2">
                                </div>
                            @endif
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="flex items-center justify-end mt-8 gap-4">
                            <a href="{{ route('admin.articles.index') }}" class="text-gray-600 underline">Cancel</a>
                            <button type="submit" class="bg-[#283593] hover:bg-[#1A237E] text-white font-bold py-2 px-6 rounded-lg">
                                Update Article
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection