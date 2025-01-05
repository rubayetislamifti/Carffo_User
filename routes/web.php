<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories;
use App\Http\Controllers\SubCategories;

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
        Route::get('category/create', [Categories::class, 'create'])->name('addCategory');
        Route::post('category', [Categories::class, 'store'])->name('insertCategory');
        Route::get('category/{id}/{name?}', [Categories::class, 'show'])->name('showCategory');
        Route::get('category/{id}/{name?}/edit', [Categories::class, 'edit'])->name('editCategory');

        Route::get('subcategory/create', [SubCategories::class, 'create'])->name('addSubCategory');
        Route::post('subcategory', [SubCategories::class, 'store'])->name('insertSubCategory');
        Route::get('subcategory', [SubCategories::class, 'index'])->name('SubCategory');

        Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
    });
});
