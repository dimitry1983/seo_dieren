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

$domain   = domain();
$domain   = "https://www.seosite1.nl";
$website  = \App\Models\Site::get_info($domain);

if(!empty($website)) {
    session(['website'  => $website]);
}

Route::get('/api/cities', [CityController::class, 'search']);

//Volt::routes(); 

// Register (Registreren)
Volt::route('/registreren', 'auth.register')->name('register');

// Login
Volt::route('/inloggen', 'auth.login')->name('login');

// Forgot Password (Wachtwoord vergeten)
Volt::route('/wachtwoord-vergeten', 'auth.forgot-password')->name('password.request');

// Password Reset
Volt::route('/wachtwoord-herstellen/{token}', 'auth.reset-password')->name('password.reset');
Volt::route('/wachtwoord-herstellen', 'auth.reset-password')->name('password.update');

// Optional: Logout post route

Route::post('/uitloggen', Logout::class)->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

//require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/cms/dashboard', \App\Livewire\Company\Dashboard::class)->name('company.dashboard');
    Route::middleware(['claim.pending.redirect'])->group(function () {
        Route::get('/cms/bedrijfsinformatie', \App\Livewire\Company\CompanyInformation::class)->name('company.company-info');
        Route::get('/cms/media', \App\Livewire\Company\Media::class)->name('company.company-media');
        Route::get('/cms/openingstijden', \App\Livewire\Company\OpeningTimes::class)->name('company.openingstime');
        Route::get('/cms/prijzen', \App\Livewire\Company\Prices::class)->name('company.company-pricing');
        Route::get('/cms/recencies', \App\Livewire\Company\Reviews::class)->name('company.company-reviews');
        Route::get('/cms/blogs', \App\Livewire\Company\Blogs::class)->name('company.company-blogs');
        Route::get('/cms/support', App\Livewire\Company\SupportMessage::class)->name('company.support');
    });
    //Route::get('/cms/inbox', \App\Livewire\Company\Inbox::class)->name('company.company-inbox');
    //Route::get('/cms/facturen', \App\Livewire\Company\Invoices::class)->name('company.company-invoices');
});
//routing for the website

Route::get('/preview-mail', function () {
    $fakeUser = User::find(1);
   
    $content = "dddd";
    return (new SupportMessageMail($fakeUser, $content))->render();
});

Route::get('/sitemap', [SitemapController::class, 'sitemap'])->name('site.map.ads');

// Site Routes
Route::middleware(['bread'])->group(function () {
    Route::get('/', [SiteController::class, 'index'])->name('home');
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
        ->where('slug', '^(?!admin).*') // Exclude "admin" as the first segment
        ->name('profile');

    Route::get('/contact', App\Livewire\ContactForm::class)->name('contact');
    Route::get('/{slug}', [SiteController::class, 'page'])->name('custom.page'); 

   

    // Search Routes
   // Route::get('/zoekresultaat', [SearchController::class, 'search'])->name('search');
});

//routings for dashboard

 


Route::redirect('dashboard', 'cms/dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/convert', [SiteController::class, 'convertDB'])->name('site.convert');    
Route::get('/convert2', [SiteController::class, 'convertDBAgain'])->name('site.convert2');    

