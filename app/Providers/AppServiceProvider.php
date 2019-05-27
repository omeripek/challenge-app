<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//use File;
//use View;

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
        foreach (File::directories(base_path('Modules')) as $moduleDir) {
            View::addLocation($moduleDir);
        }
        */
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
