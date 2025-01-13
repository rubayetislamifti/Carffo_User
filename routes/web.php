<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories;
use App\Http\Controllers\SubCategories;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/shop', [HomepageController::class, 'shop'])->name('shop');
Route::get('/shop/details/{product}/{product_name}', [HomepageController::class, 'shopDetails'])->name('shopDetails');
Route::get('/login', [HomepageController::class, 'login'])->name('login');
Route::get('/register', [HomepageController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registration'])->name('registration');
Route::post('/login', [AuthController::class, 'loggin'])->name('loggin');


/*Admin*/
Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('loginPage');
    Route::post('/logged', [DashboardController::class, 'logging'])->name('logged');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/welcome', [DashboardController::class, 'welcome'])->name('dashboard');

        Route::resource('category', Categories::class);
        Route::resource('subcategory', SubCategories::class);
        Route::resource('product', Products::class);

        Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    });
});
