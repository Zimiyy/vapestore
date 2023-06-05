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
Route::name('contact')->get('/contact',[LandingController::class,'contact']);

Route::name('product.')->prefix('product')->group(function () {
    Route::name('index')->get('/',[ProductController::class,'index']);
    Route::name('details')->get('/details/{id}',[ProductController::class,'details']);
    Route::name('cart')->get('/cart',[ProductController::class,'cart']);
    Route::name('payment')->get('/payment',[ProductController::class,'payment']);
    Route::name('wishlist')->get('/wishlist',[ProductController::class,'wishlist']);
});

Route::middleware('guest')->group(function () {
    Route::name('signin')->get('/signin',[LandingController::class,'signin']);
    Route::name("signin.post")->post('login/post', [LandingController::class, 'signin_post']);
    Route::name('register')->get('/register',[LandingController::class,'register']);
    Route::name('register.post')->post('/register/post',[LandingController::class,'register_post']);
});

Route::middleware('auth')->group(function () {
    Route::name("signout")->get('signout', [LandingController::class, 'signout']);
});

