<?php

namespace App\Providers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('layout.app', function ($view) {
            $cart = session()->get('cart', []);
            $totalPrice = 0;

            foreach ($cart as $item) {
                $totalPrice += $item['price'] * $item['quantity'];
            }
            Log::info('Total Cart Price: ' . $totalPrice);
            $view->with('cartTotalPrice', $totalPrice);
        });
    }
}
