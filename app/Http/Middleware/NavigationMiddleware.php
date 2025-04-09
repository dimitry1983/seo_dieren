<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Navigation;

class NavigationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the shop ID from the route parameter or session (adjust as needed)
       

        // Fetch the navigation menus
        $navigations = Navigation::getNavigations();

        // Share the navigation menus with all views
        view()->share('navigations', $navigations);

        return $next($request);
    }
}