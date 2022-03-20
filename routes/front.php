<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomLoginController;






// Route::name('front.')->prefix('front')->group(function () {

//         Route::get('login', [LoginController::class, 'index'])->name('login.index');
//         Route::post('login', [LoginController::class, 'update'])->name('login.update');

//
 Route::name('front.')->prefix('front')->group(function () {

        Route::get('custom/index', [CustomLoginController::class, 'index'])->name('custom.index');
        Route::post('custom/update', [CustomLoginController::class, 'update'])->name('custom.update');
        Route::get('/logout', [CustomLoginController::class, 'logout'])->name('logout');
  });




Route::middleware('auth:customer')->group(function () {

     // Route::view('/','front.home')->name('front.home');
     // Route::view('/cart','front.cart')->name('front.cart');
     //Route::view('/parent','front.parent')->name('front.parent');
  Route::get('/books', [BookController::class, 'index'])->name('front.books');
  Route::get('/home', [HomeController::class, 'index'])->name('front.home');
  Route::get('/cart', [CartController::class, 'index'])->name('front.cart');
   Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

  });












