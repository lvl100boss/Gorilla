<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('posts.index');
})->name('home');
Route::view('/contact', 'posts.contact')->name('contact');
Route::view('/aboutus', 'posts.aboutus')->name('aboutus');
Route::view('/products', 'posts.products')->name('products');

Route::middleware('auth')->group(function(){
    // Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')-> name('register');
    Route::post('/register',[AuthController::class,'register']);
    
    Route::view('/login', 'auth.login')-> name('login');    
    Route::post('/login',[AuthController::class,'login']);
});

