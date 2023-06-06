<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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
Route::name('contact')->get('/contact',[LandingController::class,'contact']);

Route::name('product.')->prefix('product')->group(function () {
    Route::name('index')->get('/',[ProductController::class,'index']);
    Route::name('details')->get('/details/{id}',[ProductController::class,'details']);
    Route::name('cart')->get('/cart',[ProductController::class,'cart']);
    Route::name('cart.decrease')->get('/cart/decrease/{id}',[CartController::class,'decrease']);
    Route::name('cart.increase')->get('/cart/increase/{id}',[CartController::class,'increase']);
    Route::name('cart.delete-all')->get('/cart/delete-all/{id}',[CartController::class,'deleteAll']);
    Route::name('payment')->get('/payment',[ProductController::class,'payment']);
    Route::name('cart.checkout')->post('/cart/checkout',[CartController::class,'checkout']);
    Route::name('wishlist')->get('/wishlist',[ProductController::class,'wishlist']);
});

Route::middleware('guest')->group(function () {
    Route::name('signin')->get('/signin',[LandingController::class,'signin']);
    Route::name("signin.post")->post('login/post', [LandingController::class, 'signin_post']);
    Route::name('register')->get('/register',[LandingController::class,'register']);
    Route::name('register.post')->post('/register/post',[LandingController::class,'register_post']);
});

Route::name('ajax.')->prefix('ajax')->group(function () {
    Route::name("addtocart")->get('addtocart/{product}/{color}/{storage}', [CartController::class, 'add']);
});

Route::middleware('auth')->group(function () {
    Route::name("signout")->get('signout', [LandingController::class, 'signout']);
});

