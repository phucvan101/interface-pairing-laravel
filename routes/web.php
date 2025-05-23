<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// home
Route::get('/', [HomeController::class, 'index'])->name('home');

// category 
Route::get('/category/{slug}/{id}', [
    'as' => 'category.product',
    'uses' => 'App\Http\Controllers\CategoryController@index',
]);

// search product
Route::get('/search', [ProductController::class, 'search'])->name('search');


// add to cart
Route::get('/products/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');


// show cart 
Route::get('/products/show-to-cart', [ProductController::class, 'showCart'])->name('showCart');

// update cart 
Route::post('/products/update-cart', [ProductController::class, 'updateCart'])->name('cart.update');
Route::post('/products/delete-cart', [ProductController::class, 'deleteCart'])->name('cart.delete');
