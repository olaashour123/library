<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\Users\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::view('/','admin.categories.index');

 Route::view('master','admin.layouts.master')->name('master');

// Route::view('/temp','admin.layouts.temp');

 //Route::get('/login',[LoginController::class,'index'])->name('index');



Route::name('admin.')->prefix('admin')->group(function () {

        Route::get('login', [LoginController::class, 'index'])->name('login.index');
        Route::post('login', [LoginController::class, 'update'])->name('login.update');

        });


Route::name('admin.')->prefix('admin')->middleware(['auth:admin', 'throttle:100,1'])->group(function () {
         //    Route::group([  'name'=>'admin.','prefix' => 'admin', 'middleware' => ['auth:admin', 'throttle:100,1']], function ()
        //  {
        //      Route::get('dashboard',DashboardController::class)->name('dashboard.index');
        //    Route::view('/','admin.layouts.master')->name('admin.layouts.master');

         Route::get('users', [UserController::class, 'index'])->name('users.index');
         Route::get('users/create', [UserController::class, 'create'])->name('users.create');
         Route::post('users/store', [UserController::class, 'store'])->name('users.store');
         Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
         Route::post('users/update/{id}', [UserController::class, 'update'])->name('users.update');
         Route::get('users/destroy/{id}', [UserController::class, 'destroy'])->name('users.destroy');


         Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
         Route::get('categories/create', [CategoryController::class, 'create'])->name('categories.create');
         Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
         Route::get('categories/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
         Route::put('categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
         Route::get('categories/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


         Route::get('publishers', [PublisherController::class, 'index'])->name('publishers.index');
         Route::get('publishers/create', [PublisherController::class, 'create'])->name('publishers.create');
         Route::post('publishers/store', [PublisherController::class, 'store'])->name('publishers.store');
         Route::get('publishers/edit/{id}', [PublisherController::class, 'edit'])->name('publishers.edit');
         Route::put('publishers/update/{id}', [PublisherController::class, 'update'])->name('publishers.update');
         Route::get('publishers/destroy/{id}', [PublisherController::class, 'destroy'])->name('publishers.destroy');
          Route::get('publishers/my_author/{id}', [PublisherController::class, 'show'])->name('publishers.show');
         Route::post('publishers/addAuthors', [PublisherController::class, 'addAuthors'])->name('publishers.addAuthors');
         Route::get('publishers/deleteAuthors/{author}/{id}', [PublisherController::class, 'delete'])->name('publishers.deleteAuthors');


         Route::get('authors', [AuthorController::class,'index'])->name('authors.index');
         Route::get('authors/create', [AuthorController::class, 'create'])->name('authors.create');
         Route::post('authors/store', [AuthorController::class, 'store'])->name('authors.store');
         Route::get('authors/edit/{id}', [AuthorController::class, 'edit'])->name('authors.edit');
         Route::put('authors/update/{id}', [AuthorController::class, 'update'])->name('authors.update');
         Route::get('authors/destroy/{id}', [AuthorController::class, 'destroy'])->name('authors.destroy');
         Route::get('authors/my_publisher/{id}', [AuthorController::class, 'show'])->name('authors.show');
         Route::post('authors/addPublishers', [AuthorController::class, 'addPublishers'])->name('authors.addPublishers');
         Route::get('authors/deletePublishers/{author}/{id}', [AuthorController::class, 'delete'])->name('authors.deletePublishers');


});

