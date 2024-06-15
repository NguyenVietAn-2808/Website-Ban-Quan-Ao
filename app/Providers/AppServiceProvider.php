<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        //them vao de hien thi số lượng sp trên icon giỏ hàng
        view()->composer('*', function ($view) {
            $cart = Session::get('cart', []);
            $totalQuantity = array_sum($cart); // Assuming $cart is ['product_id' => quantity, ...]
            $view->with('totalQuantity', $totalQuantity);
        });
    }
}
