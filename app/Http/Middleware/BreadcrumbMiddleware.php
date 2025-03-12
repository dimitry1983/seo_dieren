<?php

namespace App\Http\Middleware;

use App\Models\Advertisement;
use App\Models\Category;
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
                'name' => devTranslate('bread.Bedrijven informatie', 'Bedrijven informatie')
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
