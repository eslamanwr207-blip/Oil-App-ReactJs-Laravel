<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Website\CartController;
use App\Http\Controllers\Website\IndexController;
use App\Models\Website\ReviewController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/



// ✅ جميع الصفحات تحت نطاق LaravelLocalization
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'web']
    ],
    function () {

        Route::middleware(['auth'])->group(function(){

            // ✅ الصفحة الرئيسية
            Route::get('/', [IndexController::class, 'index'])->name('index');
            Route::get('about_us', [IndexController::class, 'about_us'])->name('about_us');
            Route::get('categories', [\App\Http\Controllers\Website\CategoryController::class, 'index'])->name('categories');
            Route::get('categories/all/{id}', [\App\Http\Controllers\Website\CategoryController::class, 'all'])->name('categories.all');
            Route::get('products', [\App\Http\Controllers\Website\ProductController::class, 'index'])->name('products');
            Route::get('products/product_details/{id}', [\App\Http\Controllers\Website\ProductController::class, 'product_details'])->name('products.product_details');

            Route::get('cart', [CartController::class, 'index'])->name('cart.index');
            Route::post('/cart/sync', [CartController::class, 'sync'])->name('cart.sync');

            Route::post('/review', [\App\Http\Controllers\ReviewControllerController::class, 'store'])->name('review.store');


            Route::resources([
                'dashboard/settings'=> SettingController::class,
                'dashboard/categories'=> CategoryController::class,
                'dashboard/products'=> ProductController::class,
                'dashboard/orders'=> OrderController::class,
            ]);

            Route::get('dashboard', [\App\Http\Controllers\Dashboard\IndexController::class, 'index'])->name('dashboard');
            Route::get('dashboard/settings', [SettingController::class, 'index'])->name('settings.index');
            Route::post('dashboard/settings/update/{setting}', [SettingController::class, 'update'])->name('settings.update');

            Route::post('dashboard/categories/delete', [CategoryController::class, 'delete'])->name('categories.delete');


            Route::post('dashboard/products/delete', [ProductController::class, 'delete'])->name('products.delete');

        });

        // ✅ لوحة التحكم
        Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => ['auth']], function () {




        });



        Auth::routes();
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        // ✅ صفحة عامة لقبول أي مسار غير معروف داخل نطاق اللغة
        Route::get('/{page}', [AdminController::class, 'index'])->where('page', '.*');
    }
);

// ✅ مصادقة المستخدمين
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
