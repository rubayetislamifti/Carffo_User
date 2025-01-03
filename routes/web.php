<?php

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/shop', [HomepageController::class, 'shop'])
    ->name('shop');



/*Admin*/
Route::prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('loginPage');
    Route::post('/logged', [DashboardController::class, 'logging'])->name('logged');
    Route::get('/welcome', [DashboardController::class, 'welcome'])
        ->middleware(AdminMiddleware::class)
        ->name('dashboard');
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
