<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		/*
		View::composer('includes.header', function($view) {
            $cart_qty =  Session::get('cart') ? array_sum(array_column(Session::get('cart'), 'qty')) : 0;
            $view->with('cart_qty',$cart_qty);
        });*/
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
