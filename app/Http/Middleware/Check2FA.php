<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Check2FA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       // Check if the user is authenticated and two-factor authentication is enabled
        if (Auth::check() && Auth::user()->two_factor_secret) {
            // Check if the two-factor authentication session variable is not set
            if (!$request->session()->has('user_2fa')) {
                // Redirect the user to the two-factor authentication verification page
                return redirect()->route('two_fa.index');
            }
        }
        return $next($request);
       
    }
}
