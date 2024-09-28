<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Product2Controller;

// Routes for ProductController
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/home', [ProductController::class, 'index'])->name('index');
// Route::get('/products', [ProductController::class])->name('products');
Route::resource('posts', ProductController::class);
Route::get('/products', [ProductController::class, 'show'])->name('products');

// Route::get('/admin/create', [AdminController::class, 'create'])->name('products.create');
// Route::post('/admin/addProduct', [AdminController::class, 'store'])->name('products.store');

// // Resource routes for products

// // Static pages
Route::view('/contact', 'posts.contact')->name('contact');
Route::view('/aboutus', 'posts.aboutus')->name('aboutus');

// Route::resource('/admin/adminProducts', AdminController::class);
// Route::view('/admin/adminDashboard','admin.adminDashboard')->name('admin_dashboard');
// Route::get('/admin/adminProducts',[AdminController::class, 'show'])->name('admin_products');
// Route::view('/admin/adminOrders','admin.adminOrders')->name('admin_orders');
// Route::view('/admin/adminUsers','admin.adminUsers')->name('admin_users');
// Route::view('/admin/adminHistory','admin.adminHistory')->name('admin_history');

Route::get('/searchProducts', [ProductController::class, 'searchProducts'])->name('searchProducts');
// Route::get('/search', [AdminController::class, 'searchProducts'])->name('search2');

// Route::view('/admin/addProduct', 'admin.addProduct')->name('add_product');

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

// admin routes
// Route::prefix('admin')->middleware('auth')->group(function () {
    // Create and store product routes
    Route::get('/admin/addproducts', function () {
        return view('admin.addProduct');
    })->name('admin_add_products');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.products.store');

    
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
// });

// For admin routes