<?php

namespace App\Http\Middleware;

use App\Models\Claim;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfClaimPending
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $claim = Claim::where('email', $user -> email)->where('status', 'Pending')->first();



        // Check if the user is authenticated and has a pending claim
        if ($claim && $claim->id > 0) {
            return redirect()->route('company.dashboard');
        }

        return $next($request);
    }
}
