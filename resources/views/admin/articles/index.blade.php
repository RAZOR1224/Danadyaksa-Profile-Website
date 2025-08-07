@extends('layouts.app')
@section('title', __('admin.articles_manage'))
@section('content')
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white pt-32 pb-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-4 sm:mb-0">{{ __('admin.articles_manage') }}</h1>
                <a href="{{ route('admin.articles.create') }}" class="bg-white text-[#283593] border border-[#283593] hover:bg-gray-100 font-bold py-2 px-4 rounded-lg text-center transition-colors">{{ __('admin.btn_create') }}</a>
            </div>
        </div>
    </section>
    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            {{-- BREADCRUMB --}}
            <div class="mb-6 text-sm">
                <a href="{{ route('dashboard') }}" class="font-medium text-gray-500 hover:text-primary">Dashboard</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <span class="text-gray-700">{{ __('admin.articles_manage') }}</span>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_image') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_title') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_author') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_created') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($articles as $article)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($article->image)<img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-10 w-16 object-cover rounded">
                                            @else<div class="h-10 w-16 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">No Image</div>@endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ Str::limit($article->title, 30) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $article->user->name ?? 'User Deleted' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $article->created_at->format('d M Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.articles.edit', $article) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('admin.action_edit') }}</a>
                                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('{{ __('admin.delete_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('admin.action_delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">{{ __('admin.articles_none') }}</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                     <div class="mt-4">{{ $articles->links() }}</div>
                </div>
            </div>
        </div>
    </section>
@endsection