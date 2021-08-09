<?php

use App\Http\Controllers\{BlogController, 
                          PostController,
                          CategoryController,
                          HomeController,
                          UserController,
                          GalleryController};
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
// Front End
Route::get('/',[BlogController::class,'index'])->name('index');
Route::get('single-page',[BlogController::class,'show'])->name('single-page');
Route::get('blog/{slug}', [BlogController::class,'detail'])->name('blog.post');
// Authentication
Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified','auth'],  function(){ 
    /*
        -> CRUD Category
        -> SoftDelete Category 
    */ 
    Route::get('post/trashed',[PostController::class,'trashed'])->name('post.trashed');
    Route::resource('post', PostController::class);
    Route::get('post/restore/{id}',[PostController::class,'restore'])->name('post.restore');
    Route::delete('post/delete/{id}',[PostController::class,'delete'])->name('post.delete');
    
    /*
        -> CRUD Category
        -> SoftDelete Category 
    */ 
    Route::get('category/trashed',[CategoryController::class,'trashed'])->name('category.trashed');
    Route::resource('category', CategoryController::class);
    Route::get('category/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
    Route::delete('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
    
    Route::resource('user', UserController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('post.dashboard');

    /*
        -> Image List
    */ 
    Route::get('gallery', [GalleryController::class,'index'])->name('photos');
});


// Route::view('coba', 'admin.users.verified-email')->middleware('verified');


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });




