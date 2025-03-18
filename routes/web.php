<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;


Route::get('/cms/dashboard', \App\Livewire\Company\Dashboard::class)->name('company.dashboard');
Route::get('/cms/bedrijfsinformatie', \App\Livewire\Company\CompanyInformation::class)->name('company.company-info');
Route::get('/cms/media', \App\Livewire\Company\Media::class)->name('company.company-media');
Route::get('/cms/openingstijden', \App\Livewire\Company\OpeningTimes::class)->name('company.openingstime');
Route::get('/cms/prijzen', \App\Livewire\Company\Prices::class)->name('company.company-pricing');
Route::get('/cms/recencies', \App\Livewire\Company\Reviews::class)->name('company.company-reviews');
Route::get('/cms/blogs', \App\Livewire\Company\Blogs::class)->name('company.company-blogs');
Route::get('/cms/inbox', \App\Livewire\Company\Inbox::class)->name('company.company-inbox');
Route::get('/cms/facturen', \App\Livewire\Company\Invoices::class)->name('company.company-invoices');

//routing for the website

// Site Routes
Route::get('/', [SiteController::class, 'index'])->name('home');
Route::get('/over-ons', [SiteController::class, 'about'])->name('about');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');

// Blog Routes
Route::get('/blog', [BlogController::class, 'overview'])->name('blog.overview');
Route::get('/blog/{slug}', [BlogController::class, 'blogDetail'])->name('blog.detail');

// Overview Routes
Route::get('/overzicht', [OverviewController::class, 'map'])->name('map');

// Profile Routes
Route::get('/{slug}/{id}', [ProfileController::class, 'profile'])
    ->where('slug', '^(?!admin).*') // Exclude "admin" as the first segment
    ->name('profile');

// Search Routes
Route::get('/zoekresultaat', [SearchController::class, 'search'])->name('search');


//routings for dashboard







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
