<?php

use App\Http\Controllers\Admin\{  Post\PostController,
                                  Category\CategoryController,
                                  Users\UsersController,
                                  Gallery\GalleryController
                            };
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'verified','auth'],  function(){ 
    /*
        -> CRUD POST
        -> SOFT DELETE POST
    */ 
    Route::get('post/trashed',[PostController::class,'trashed'])->name('post.trashed');
    Route::resource('post', PostController::class);
    Route::get('post/restore/{id}',[PostController::class,'restore'])->name('post.restore');
    Route::delete('post/delete/{id}',[PostController::class,'delete'])->name('post.delete');


    /*
        -> CRUD CATEGORY
        -> SOFT DELETE CATEGORY
    */ 
    Route::get('category/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
    Route::resource('category', CategoryController::class);
    Route::get('cobasaja',[CategoryController::class,'index3']);
    Route::get('category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::delete('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    
    /*
        -> USERS
    */ 
    Route::resource('user', UsersController::class);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    /*
        -> Gallery
    */

    Route::get('gallery', [GalleryController::class,'index'])->name('gallery');
    Route::get('image', [GalleryController::class,'image']);
    Route::get('file', [GalleryController::class,'file']);
   
    });
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});