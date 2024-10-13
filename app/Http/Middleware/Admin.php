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
            //EDITED. If the admin tries to access the cart page, redirect them
            return redirect()->route('admin_dashboard');
        } else {
            // If the user is not an admin, you can redirect them or handle non-admin logic here
            return redirect()->back();
        }
        // If the user is an admin and not accessing restricted routes, continue with the request
        return $next($request);
    }
}