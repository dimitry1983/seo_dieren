<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;


//routing for the website

// Site Routes
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

// Blog Routes
Route::get('/blog', [BlogController::class, 'overview'])->name('blog.overview');
Route::get('/blog/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');

// Overview Routes
Route::get('/overzicht', [OverviewController::class, 'map'])->name('map');

// Profile Routes
Route::get('/{slug}/{id}', [ProfileController::class, 'profile'])->name('profile');

// Search Routes
Route::get('/zoekresultaat', [SearchController::class, 'search'])->name('search');






Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/convert', [SiteController::class, 'convertDB'])->name('site.convert');    
Route::get('/convert2', [SiteController::class, 'convertDBAgain'])->name('site.convert2');    

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
