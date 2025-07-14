@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto px-6 py-12">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <div class="mt-4 border-t pt-4">
            <p class="text-lg text-gray-700">Welcome back, {{ Auth::user()->name }}!</p>
            <p class="mt-2 text-gray-600">You are logged in.</p>
        </div>
    </div>
</div>
@endsection