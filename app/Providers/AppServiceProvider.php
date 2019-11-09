<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $image = Setting::where('key','site.bg_image')->value('value');
        \View::share('bg_image',$image);
    }
}
