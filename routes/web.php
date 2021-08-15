<?php

use App\Http\Controllers\{  CategoryController,
                            DashboardController,
                            LocalizationController,
                            TagController,
                        };
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/localization/{language}',[LocalizationController::class,'switch'])->name('localization.switch');


Route::get('/', function () {
    return view('welcome');
});


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
    Route::resource('/tags', TagController::class);
    /*
        Laravel FileManager
    */
    Route::group(['prefix' => 'filemanager'], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
});
