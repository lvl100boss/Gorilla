<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;

// Routes for ProductController
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('index');
Route::resource('posts', ProductController::class);

Route::get('/products', [ProductController::class, 'show'])->name('products');

//EDITED. GO TO THE PRODUCT_DETAIL PAGE AND GET THE DETAILS OF THE PRODUCT
Route::get('/products/{id}', [ProductController::class, 'show_detail'])->name('show_details');
Route::post('/products/{id}', [CartController::class, 'store'])->name('cart_store');

// Static pages
Route::view('/contact', 'posts.contact')->name('contact');
Route::view('/aboutus', 'posts.aboutus')->name('aboutus');



Route::get('/searchProducts', [ProductController::class, 'searchProducts'])->name('searchProducts');


//for Auth routes
Route::middleware('auth')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // user routes
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user_dashboard');

    //EDITED. this is for the cart
    Route::resource('cart', CartController::class);
    Route::get('/Shopping/cart', [CartController::class, 'index'])->name('cart_page');
    Route::patch('/cart/update-quantity/{id}', [CartController::class, 'updateQuantity'])->name('cart_updateQuantity');
    Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart_destroy');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart_checkout');

});

//for Guest Routes
Route::middleware('guest')->group(function(){
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    
    Route::view('/login', 'auth.login')->name('login');    
    Route::post('/login', [AuthController::class, 'login']);
});

// admin routes
Route::middleware('auth', 'admin')->group(function () {

    // Create and store product routes
    Route::get('/admin/addproducts', function () {
        return view('admin.addProduct');
    })->name('admin_add_products');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.products.store');

    // Edit and update product routes
    Route::get('/admin/editProduct/{id}', [AdminController::class, 'edit'])->name('products.edit');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('products.update');

    // Delete product route
    Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('products.destroy');

    //Restore product route
    Route::post('/admin/products/{id}/restore', [AdminController::class, 'restore'])->name('products.restore');

    
    // Show product list and search products
    Route::get('/admin/adminProducts', [AdminController::class, 'show'])->name('admin_products');
    Route::get('/admin/search', [AdminController::class, 'searchProducts'])->name('admin.products.search');
    
    // Other admin routes
    Route::get('admin/dashboard', function () {
        return view('admin.adminDashboard');
    })->name('admin_dashboard');
    
    Route::get('admin/orders', function () {
        return view('admin.adminOrders');
    })->name('admin_orders');
    
    Route::get('admin/users', function () {
        return view('admin.adminUsers');
    })->name('admin_users');
    
    Route::get('admin/history', function () {
        return view('admin.adminHistory');
    })->name('admin_history');

});

// For admin routes