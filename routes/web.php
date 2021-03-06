<?php

use App\Http\Controllers\{BlogController, CategoryController,
                            DashboardController,
                            FileManagerController,
                            LocalizationController,
                            TagController,
                            PostController,
                            RoleController,
                            UserController
};
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/localization/{language}',[LocalizationController::class,'switch'])->name('localization.switch');


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BlogController::class,'home'])->name('blog.home');
Route::get('/post/{slug}', [BlogController::class,'showPostDetail'])->name('blog.post.detail');
Route::get('/categories', [BlogController::class,'showCategories'])->name('blog.categories');
Route::get('/categories/{slug}', [BlogController::class,'showPostsByCategory'])->name('blog.posts.category');
Route::get('/tags', [BlogController::class,'showTags'])->name('blog.tags');
Route::get('/tags/{slug}', [BlogController::class,'showPostsByTag'])->name('blog.posts.tags');
Route::get('/search', [BlogController::class,'searchPosts'])->name('blog.search');


Auth::routes([
    'register'  => false
]);


Route::group(['prefix' => 'dashboard', 'middleware' => ['web','auth']], function(){
    // Dashboard
    Route::get('/', [DashboardController::class,'index'])->name('dashboard.index');
    /*
        Categories -> CRUD -> CATEGORIES
    */
    Route::get('/categories/select', [CategoryController::class,'select'])->name('categories.select');
    Route::resource('/categories', CategoryController::class);
    /*
    Tags -> CRUD -> TAGS
    */
    Route::get('/tags/select', [TagController::class,'select'])->name('tags.select');
    Route::resource('/tags', TagController::class)->except(['show']);
    /*
        Posts -> CRUD
    */
    Route::resource('/posts', PostController::class);
    /*
        Laravel FileManager
    */
    Route::group(['prefix' => 'filemanager'], function () {
        Route::get('/index',[FileManagerController::class,'index'])->name('filemanager.index');
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    /*
        Role Permission
    */
    Route::get('/roles/select',[RoleController::class,'select'])->name('roles.select');
    Route::resource('/roles', RoleController::class);
    /*
        User Permission
    */
    Route::resource('/users', UserController::class)->except('show');
});
