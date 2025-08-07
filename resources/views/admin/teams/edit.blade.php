@extends('layouts.app')

@section('title', __('admin.team_edit'))

@section('content')

    <section class="relative z-0 bg-gradient-to-r from-primaryDark to-primary text-white text-center pt-32 pb-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">
                {{ __('admin.team_edit') }}
            </h1>
        </div>
    </section>

    <section class="py-12 bg-surface">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            {{-- BREADCRUMB --}}
            <div class="mb-6 text-sm">
                <a href="{{ route('dashboard') }}" class="font-medium text-gray-500 hover:text-primary">Dashboard</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <a href="{{ route('admin.teams.index') }}" class="font-medium text-gray-500 hover:text-primary">{{ __('admin.team_manage') }}</a>
                <span class="font-medium text-gray-500 mx-2">/</span>
                <span class="text-gray-700">{{ __('admin.team_edit') }}</span>
            </div>

            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6 md:p-8 text-gray-900">
                    <form method="POST" action="{{ route('admin.teams.update', $team) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('admin.teams.partials.form', ['team' => $team])
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection