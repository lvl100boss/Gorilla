<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line\use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class AuthController extends Controller
{
    
    //register user
    public function register (Request $request) {
        //validate request
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password'=> ['required','min:3','max:255', 'confirmed']
        ]);

        //Register
        $user = User::create($fields);

        //Login
        Auth::login($user);

        //Redirect
        return redirect() -> route('home');

    }

    //login user
    public function login (Request $request) {
        //validate request
        $fields = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password'=> ['required']
        ]);

        

        //Try Login
        if (Auth::attempt($fields, $request->remember)) {
            $user = Auth::user(); 
            if ($user->userType ==='admin') {
                return redirect() -> route('admin_dashboard');
            } else {
                return redirect() -> intended();
            }

        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records.'
            ]);
        }

    }

    //logout user
    public function logout (Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect() -> route('home');
    }
}
