<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use App\Notas;
use App\Banner;

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

        view()->composer('front.partials.banner', function($view) {
            $view->with('banner',$banner = Banner::getBanner());
        });

        view()->composer('front.partials.widgets.friends', function($view) {
            $view->with('friends', Banner::getFriends());
        });

        view()->composer('front.partials.header', function ($view) {
            $current_route_name = \Request::route()->getName();
            $view->with('current', $current_route_name);

        });

        Blade::directive('utf8Decode', function($expression){
            return "<?php echo utf8_decode($expression); ?>";
        });

        Blade::directive('myGravatar', function($expression){
            return "<?php echo Gravatar::getAvatarUrl($expression); ?>";
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
