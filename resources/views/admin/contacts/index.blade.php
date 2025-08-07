@extends('layouts.app')

@section('title', __('admin.inquiries_manage'))

@section('content')

    {{-- Header Halaman --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white pt-32 pb-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-4 sm:mb-0">
                    {{ __('admin.inquiries_manage') }}
                </h1>
            </div>
        </div>
    </section>

    {{-- Konten Utama Halaman --}}
    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BREADCRUMB --}}
            <div class="mb-6 text-sm">
                <a href="{{ route('dashboard') }}" class="font-medium text-gray-500 hover:text-primary">Dashboard</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <span class="text-gray-700">{{ __('admin.inquiries_manage') }}</span>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_name') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_email') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_message') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_received') }}</th>
                                    {{-- TAMBAHKAN HEADER KOLOM BARU --}}
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $contact->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $contact->email }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ Str::limit($contact->message, 50) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $contact->created_at->format('d M Y, H:i') }}</td>
                                        {{-- TAMBAHKAN TOMBOL HAPUS --}}
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('{{ __('admin.delete_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('admin.action_delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    {{-- Sesuaikan colspan menjadi 5 --}}
                                    <tr><td colspan="5" class="px-6 py-4 text-center text-gray-500">{{ __('admin.inquiries_none') }}</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                     <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection