<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('indexLogin');
    Route::post('/login', 'loginCustomer')->name('login');
    Route::post('/sign_up', 'signUpCustomer')->name('signUp');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Category
Route::get('/category/{slug}/{id}', [CategoryController::class, 'index'])->name('category.product');

// Products
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/add-to-cart/{id}', 'addToCart')->name('addToCart');
    Route::get('/show-to-cart', 'showCart')->middleware('checkLogin')->name('showCart');
    Route::post('/update-cart', 'updateCart')->name('cart.update');
    Route::post('/delete-cart', 'deleteCart')->name('cart.delete');
});

// Product Search
Route::get('/search', [ProductController::class, 'search'])->name('search');

// Order
Route::controller(OrderController::class)->group(function () {
    Route::get('/show-order', 'showOrder')->name('showOrder');
    Route::post('/create-order', 'createOrder')->name('createOrder');
});
