<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BookDetailController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\ChangePasswordController;

Route::name('front.')->prefix('front')->group(function () {

    Route::get('doRegister', [CustomLoginController::class, 'doRegister'])->name('doRegister');
    Route::post('register', [CustomLoginController::class, 'register'])->name('register');
    Route::get('custom/index', [CustomLoginController::class, 'index'])->name('custom.index');
    Route::post('custom/update', [CustomLoginController::class, 'update'])->name('custom.update');
    Route::get('/logout', [CustomLoginController::class, 'logout'])->name('logout');
 });




Route::middleware('auth:customer')->group(function () {



//  Route::view('front/profile','front.profile')->name('front.profile');
    Route::get('front/profile', [ProfileController::class, 'index'])->name('front.profile');
    //Route::get('change_password',[ChangePasswordController::class,'index']);
    Route::put('change_password', [ChangePasswordController::class,'update'])->name('change.password');
    // Route::view('/cart','front.cart')->name('front.cart');
    //Route::view('/parent','front.parent')->name('front.parent');
    Route::get('/books/{category_id?}', [BookController::class, 'index'])->name('front.books');
    Route::get('/home', [HomeController::class, 'index'])->name('front.home');
    Route::get('front/cart', [CartController::class, 'index'])->name('front.cart');
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::put('update', [CartController::class,'update'])->name('update');
    Route::get('cart/{id}', [CartController::class, 'destroy'])->name('destroy');

    Route::get('front/checkout',[CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');


    Route::get('/book_detail/{id}', [BookDetailController::class, 'index'])->name('book_detail');


      Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist');
      Route::post('wishlist/store', [WishlistController::class, 'store'])->name('wishlist.store');
});
