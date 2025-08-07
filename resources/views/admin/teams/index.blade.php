@extends('layouts.app')

@section('title', __('admin.team_manage'))

@section('content')

    {{-- Page Header --}}
    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white pt-32 pb-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row justify-between items-center text-center sm:text-left">
                <h1 class="text-4xl font-bold mb-4 sm:mb-0">
                    {{ __('admin.team_manage') }}
                </h1>
                <a href="{{ route('admin.teams.create') }}" class="bg-white text-[#283593] border border-[#283593] hover:bg-gray-100 font-bold py-2 px-4 rounded-lg text-center transition-colors">
                    {{ __('admin.btn_add_member') }}
                </a>
            </div>
        </div>
    </section>

    {{-- Main Page Content --}}
    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BREADCRUMB --}}
            <div class="mb-6 text-sm">
                <a href="{{ route('dashboard') }}" class="font-medium text-gray-500 hover:text-primary">Dashboard</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <span class="text-gray-700">{{ __('admin.team_manage') }}</span>
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
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_name') }}</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_position') }}</th>
                                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('admin.table_actions') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($teamMembers as $member)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($member->image)
                                                <img src="{{ asset('storage/' . $member->image) }}" alt="{{ $member->full_name }}" class="h-10 w-10 object-cover rounded-full">
                                            @else
                                                <div class="h-10 w-10 bg-gray-200 rounded-full flex items-center justify-center text-xs text-gray-500">No Pic</div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium">{{ $member->full_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $member->position }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.teams.edit', $member) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('admin.action_edit') }}</a>
                                            <form action="{{ route('admin.teams.destroy', $member) }}" method="POST" class="inline-block ml-4" onsubmit="return confirm('{{ __('admin.delete_confirm') }}');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('admin.action_delete') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="4" class="px-6 py-4 text-center text-gray-500">{{ __('admin.team_none') }}</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                     <div class="mt-4">
                        {{ $teamMembers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection