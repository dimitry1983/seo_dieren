<?php

namespace App\Http\Middleware;

use App\Models\Advertisement;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Page;
use App\Models\Veterinarian;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class BreadcrumbMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Get the current route name
        $currentRouteName   = Route::currentRouteName();
      
        // Get the current route action
        $currentRouteAction = Route::currentRouteAction();

        // Optionally, get the route parameters
        $routeParameters    = Route::current()?->parameters();
        $breadcrumbData     = '';



        if ($currentRouteName == 'livewire.update'){
            $breadcrumbData = session('breadcrumbData');
        }

     
        /*
        * SITES URLS
        */

        if ($currentRouteName == 'results'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.zoekresultaten', 'zoekresultaten')
            ];
        }

        if ($currentRouteName == 'registeren'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Contact', 'Registreren')
            ];
        }

        if ($currentRouteName == 'about'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Over ons', 'Over ons')
            ];
        }

        if ($currentRouteName == 'contact'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Contact', 'Contact')
            ];
        }

        if ($currentRouteName == 'map'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Overzicht', 'Overzicht')
            ];
        }

        if ($currentRouteName == 'blog.overview'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Nieuws', 'Nieuws')
            ];
        }

        if ($currentRouteName == 'blog.detail'){

            $slug = $routeParameters['slug'];
            $id = $routeParameters['id'];
            $blogName = Blog::find($id);

            $breadcrumbData = [
                'url_one' => route('blog.overview'),
                'name_one' => __('Winkel'), 
                'total' => 2,
                'name_two' =>  $blogName->title
            ];
        }

        if ($currentRouteName == 'profile'){
            $slug = $routeParameters['slug'];
            $id = $routeParameters['id'];
            $veterarian = Veterinarian::find($id);
            $breadcrumbData = [
                'url_one' => route('map'),
                'name_one' => __('Overzicht'), 
                'total' => 2,
                'name_two' =>  $veterarian->name ?? ""
            ];
        }

     
        if ($currentRouteName == 'custom.page'){
            $slug = $routeParameters['slug'];
            $page = Page::getCustomPage($slug);
            $breadcrumbData = [
                'total' => 1,
                'name' => $page -> title
            ];
        }

        if ($currentRouteName == 'login'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Login', 'Login')
            ];
        }

        

        if ($currentRouteName == 'password.request'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Wachtwoord vergeten', 'Wachtwoord vergeten')
            ];
        }

        if ($currentRouteName == 'company.dashboard'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Dashboard', 'Dashboard')
            ];
        }

        if ($currentRouteName == 'company.company-info'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Bedrijf gegevens', 'Bedrijf gegevens')
            ];
        }

        if ($currentRouteName == 'company.company-media'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Media', 'Media')
            ];
        }

        if ($currentRouteName == 'company.openingstime' ){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Openingstijden', 'Openingstijden')
            ];
        }

        if ($currentRouteName == 'company.company-pricing' ){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Prijzen', 'Prijzen')
            ];
        }

        if ($currentRouteName == 'company.company-reviews'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Recencies', 'Recencies')
            ];
        }

        if ($currentRouteName == 'company.company-blogs'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Blogs', 'Blogs')
            ];
        }

        if ($currentRouteName == 'company.company-inbox'){
            $breadcrumbData = [
                'total' => 1,
                'name' => devTranslate('bread.Inbox', 'Inbox')
            ];
        }

        if (!empty($breadcrumbData)){
            session(['breadcrumbData' => $breadcrumbData]);
        }

        if (empty($breadcrumbData)){
            $breadcrumbData = session('breadcrumbData'); 
        }
 
        view()->share('breadcrumbData', $breadcrumbData);

        return $next($request);
    }
}
