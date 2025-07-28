<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Article; // <-- Add this line
use App\Models\Team;    // <-- Add this line

/*
|--------------------------------------------------------------------------
| Public Multilingual Routes
|--------------------------------------------------------------------------
*/

// Redirect root URL to the default language URL
Route::get('/', function () {
    return redirect('/en');
});

// Group all public pages under a language prefix
Route::prefix('{locale}')->where(['locale' => '[a-z]{2}'])->group(function () {
    
    // Main page routes
    Route::get('/', function () { return view('pages.home'); })->name('home');
    Route::get('/about', function () { return view('pages.about'); })->name('about');
    Route::get('/services', function () { return view('pages.services'); })->name('services');
    Route::get('/contact', function () { return view('pages.contact'); })->name('contact');

    // --- UPDATED DYNAMIC ROUTES ---
    Route::get('/team', function () {
        $teamMembers = Team::orderBy('created_at', 'asc')->get();
        return view('pages.team', ['teamMembers' => $teamMembers]);
    })->name('team');

    Route::get('/articles', function () {
        $articles = Article::latest()->paginate(6);
        return view('pages.articles', ['articles' => $articles]);
    })->name('articles');
    // ----------------------------

    // Routes for the dropdown
    Route::get('/business-intelligence', function() { 
        return 'Business Intelligence Page - Coming Soon!'; 
    })->name('business-intelligence');
    Route::get('/service-estimation-time', function() { 
        return 'Service Estimation Time Page - Coming Soon!'; 
    })->name('service-estimation-time');

    // Handle the contact form submission
    Route::post('/contact', function () {
        return back()->with('success', 'Thank you for your message!');
    })->name('contact.submit');
});


/*
|--------------------------------------------------------------------------
| Breeze Authentication & Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';