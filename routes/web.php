<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
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

Route::name('landing')->get('/',[LandingController::class,'index']);
Route::name('signin')->get('/signin',[LandingController::class,'signin']);
Route::name('register')->get('/register',[LandingController::class,'register']);
Route::name('contact')->get('/contact',[LandingController::class,'contact']);

Route::name('product.')->prefix('product')->group(function () {
    Route::name('index')->get('/',[ProductController::class,'index']);
    Route::name('details')->get('/details',[ProductController::class,'details']);
    Route::name('cart')->get('/cart',[ProductController::class,'cart']);
    Route::name('payment')->get('/payment',[ProductController::class,'payment']);
    Route::name('wishlist')->get('/wishlist',[ProductController::class,'wishlist']);
});

