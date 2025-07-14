<?php

use Illuminate\Support\Facades\Route;

// Redirect root to the default language
Route::get('/', function () {
    return redirect('/en');
});

// Group all pages under a language prefix
Route::prefix('{locale}')->where(['locale' => '[a-z]{2}'])->group(function () {

    Route::get('/', function () { return view('pages.home'); })->name('home');
    Route::get('/about', function () { return view('pages.about'); })->name('about');
    Route::get('/services', function () { return view('pages.services'); })->name('services');
    Route::get('/team', function () { return view('pages.team'); })->name('team');
    Route::get('/articles', function () { return view('pages.articles'); })->name('articles');
    Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
    
    // Routes for the "Misc" dropdown in your header
    Route::get('/business-intelligence', function() { return 'Business Intelligence Page - Coming Soon!'; })->name('business-intelligence');
    Route::get('/service-estimation-time', function() { return 'Service Estimation Time Page - Coming Soon!'; })->name('service-estimation-time');

    // Handle the contact form submission
    Route::post('/contact', function () {
        // Form logic will go here
        return back()->with('success', 'Thank you for your message!');
    })->name('contact.submit');
});