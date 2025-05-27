<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SitemapController;
use App\Http\Livewire\ContactForm;
use App\Livewire\Actions\Logout;
use App\Mail\SupportMessageMail;
use App\Models\User;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

$domain   = domain();
$domain   = "https://www.dierenvergelijker.nl";
$website  = \App\Models\Site::get_info($domain);

if(!empty($website)) {
    session(['website'  => $website]);
    $key = 'adminmail';
    $emailAdmin = \App\Models\Setting::getSetting($key);
    config(['mail.admin_email' => $emailAdmin['option_value']]);
}

Route::get('/api/cities', [CityController::class, 'search']);



Route::get('/preview-mail', function () {
    $fakeUser = User::find(1);
   
    $content = "dddd";
    return (new SupportMessageMail($fakeUser, $content))->render();
});

Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('site.map.ads');

// Site Routes
Route::middleware(['bread'])->group(function () {
    Route::get('/', [SiteController::class, 'homePage'])->name('home');
    Route::get('/more-information', [SiteController::class, 'getMoreInformation'])->name('more');
    //getMoreInformation
    Route::get('/zoekresultaten', [SiteController::class, 'results'])->name('results');
    Route::get('/over-ons', [SiteController::class, 'about'])->name('about');

    // Blog Routes
    Route::get('/blog', [BlogController::class, 'overview'])->name('blog.overview');
    Route::get('/blog/{slug}/{id}', [BlogController::class, 'blogDetail'])->name('blog.detail');

    // Overview Routes
    Route::get('/overzicht', [OverviewController::class, 'map'])->name('map');

    // Profile Routes
    Route::get('/{slug}/{id}', [ProfileController::class, 'profile'])
    ->where([
        'slug' => '^(?!admin).*',  // Exclude "admin"
        'id' => '[0-9]+'           // Ensure ID is an integer
    ])
    ->name('profile');

    Route::get('/contact', App\Livewire\ContactForm::class)->name('contact');
    Route::get('/{slug}', [SiteController::class, 'page'])->name('custom.page'); 

    Route::get('/{slug}/{city}', [SiteController::class, 'seopage'])->name('page.city'); 
    //Route::get('/{slug}/{provincie}/{city}', [SiteController::class, 'seopage'])->name('page.province.city'); 
    // Search Routes
   // Route::get('/zoekresultaat', [SearchController::class, 'search'])->name('search');
});

//routings for dashboard

 


Route::redirect('dashboard', 'cms/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/convert', [SiteController::class, 'convertDB'])->name('site.convert');    
Route::get('/convert2', [SiteController::class, 'convertDBAgain'])->name('site.convert2');    

