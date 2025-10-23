<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\TestController;



// ✅ تغيير اللغة
Route::get('lang/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return redirect()->back();
})->name('changeLang');

Route::get('/', [\App\Http\Controllers\WebsiteController::class, 'index'])->name('index');

Route::get('posts/{id}', [\App\Http\Controllers\WebsiteController::class , 'posts'])->name('posts_id');
Route::get('post_detailes/{id}', [\App\Http\Controllers\WebsiteController::class , 'post_details'])->name('post_details');


// ✅ الصفحة الرئيسية
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::get('settings', [\App\Http\Controllers\SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/update/{setting}', [\App\Http\Controllers\SettingController::class , 'update'])->name('settings.update');

    Route::resource('category', \App\Http\Controllers\CategoryController::class);
    Route::post('category/delete', [\App\Http\Controllers\CategoryController::class , 'delete'])->name('category.delete');

    Route::resource('post', \App\Http\Controllers\PostController::class);
    Route::post('post/delete', [\App\Http\Controllers\PostController::class , 'delete'])->name('post.delete');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
