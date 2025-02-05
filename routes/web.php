<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomepageController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Categories;
use App\Http\Controllers\SubCategories;
use App\Http\Controllers\CartController;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [HomepageController::class, 'login'])->name('login');
    Route::get('/register', [HomepageController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registration'])->name('registration');
    Route::post('/login', [AuthController::class, 'loggin'])->name('loggin');
});


Route::get('/shop', [HomepageController::class, 'shop'])->name('shop');
Route::get('/shop/details/{product}/{product_name}', [HomepageController::class, 'shopDetails'])->name('shopDetails');


Route::post('/cart/{product_id}',[CartController::class,'store'])->name('cart.store');
Route::get('/cart',[CartController::class,'create'])->name('cart.index');
Route::put('/cart/update/{id}',[CartController::class,'update'])->name('cart.update');
Route::delete('/cart/delete/{id}',[CartController::class,'destroy'])->name('cart.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/purchase-history', [HomepageController::class, 'purchaseHistory'])->name('purchaseHistory');
    Route::get('/profile', [HomepageController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [HomepageController::class, 'profileEdit'])->name('profileEdit');
    Route::put('/profile', [HomepageController::class, 'insertProfile'])->name('profileEdit.create');
    Route::get('/checkout', [HomepageController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [HomepageController::class, 'checkoutPost'])->name('checkout.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');
});

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
