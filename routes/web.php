<?php

use Illuminate\Support\Facades\Route;

// Main Page & Profile Controllers
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;

// Admin Controllers
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\TeamController;

// Sitemap Controller - NEW
use App\Http\Controllers\SitemapController;

//Prediction Controllers
use App\Http\Controllers\PredictionController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Redirect the root URL to the default language URL
Route::get('/', function () {
    return redirect('/en');
});

// Sitemap Route (does not need a language prefix) - NEW
Route::get('sitemap.xml', [SitemapController::class, 'generate'])->name('sitemap');


/*
|--------------------------------------------------------------------------
| Public Multilingual Routes
|--------------------------------------------------------------------------
| These routes handle the pages that are visible to all visitors.
*/

// Group all public pages under a language prefix (e.g., /en/about)
Route::prefix('{locale}')->where(['locale' => '[a-z]{2}'])->group(function () {

    // Page routes managed by PageController
    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::get('/team', [PageController::class, 'team'])->name('team');
    Route::get('/articles', [PageController::class, 'articles'])->name('articles');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');
    Route::post('/contact', [PageController::class, 'submitContactForm'])->name('contact.submit');

    // Routes for the "Miscellaneous" dropdown
    Route::get('/business-intelligence', function() {
        return 'Business Intelligence Page - Coming Soon!';
    })->name('business-intelligence');

    // CHANGED: The GET route now points to PageController to show the form.
    Route::get('/service-estimation-time', [PageController::class, 'showPredictionForm'])->name('service-estimation-time');

    // The POST route still points to PredictionController to handle the logic.
    Route::post('/service-estimation-time', [PredictionController::class, 'getPrediction'])->name('predict.submit');
});


/*
|--------------------------------------------------------------------------
| Breeze Authentication & Dashboard Routes
|--------------------------------------------------------------------------
| These routes are for user login, registration, and the main dashboard.
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Admin CRUD Routes
|--------------------------------------------------------------------------
| These routes are for managing content from the admin dashboard.
*/

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('teams', TeamController::class);
    // UPDATED: Menggunakan resource route untuk index dan destroy
    Route::resource('contacts', ContactController::class)->only(['index', 'destroy']);
});

// Loads the authentication routes from Breeze (login, logout, register, etc.)
require __DIR__.'/auth.php';
