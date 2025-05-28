<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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

// SEO Site Routes
Route::middleware(['bread'])->group(function () {
    Route::get('/', [SiteController::class, 'homePage'])->name('home');
    Route::get('/over-ons', [SiteController::class, 'seoAboutUs'])->name('about');
    // Blog Routes
    Route::get('/blog', [SiteController::class, 'seoBlog'])->name('blog.overview');
    Route::get('/blog/detail', [SiteController::class, 'seoBlogDetail'])->name('blog.detail');
    Route::get('/contact', App\Livewire\ContactForm::class)->name('contact');
    Route::get('/{slug}', [SiteController::class, 'seoPages'])->name('custom.page'); 
});

   

