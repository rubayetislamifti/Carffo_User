<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;

Route::get('/', [HomepageController::class, 'index'])->name('home');
Route::get('/shop', [HomepageController::class, 'shop'])
    ->name('shop');
