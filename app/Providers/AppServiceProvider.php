<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Notas;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // FIX Specified key was too long error

        view()->composer('front.partials.widgets.archives', function($view) {
            $view->with('archives',$archives = Notas::archives());
        });
        view()->composer('front.partials.header', function ($view) {
            $current_route_name = \Request::route()->getName();
            $view->with('current', $current_route_name);

        });
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
