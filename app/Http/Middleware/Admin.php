<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is an admin
        if (Auth::check() && Auth::user()->userType == 'admin') {
            // Let admins proceed to any page, including the cart page
            return $next($request);
        }

        // Handle non-admin logic here if necessary
        return redirect()->back();
    }

}