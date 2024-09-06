<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
// use App\Http\Controllers\Product2Controller;

// Routes for ProductController
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('index');
// Route::get('/products', [ProductController::class])->name('products');
Route::resource('posts', ProductController::class);
Route::get('/products', [ProductController::class, 'show'])->name('products');

// Resource routes for products

// Static pages
Route::view('/contact', 'posts.contact')->name('contact');
Route::view('/aboutus', 'posts.aboutus')->name('aboutus');

//for Auth routes
Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

//for Guest Routes
Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::view('/login', 'auth.login')->name('login');    
    Route::post('/login', [AuthController::class, 'login']);
});



