<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/shop', [HomepageController::class, 'shop'])
    ->name('shop');



/*Admin*/
Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('loginPage');
    Route::post('/logged', [DashboardController::class, 'logging'])->name('logged');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/welcome', [DashboardController::class, 'welcome'])->name('dashboard');
        Route::get('category', [Categories::class, 'index'])->name('Category');
        Route::get('category/addCategory', [Categories::class, 'create'])->name('addCategory');
        Route::post('category/insertCategory', [Categories::class, 'store'])->name('insertCategory');


        Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    });
});
