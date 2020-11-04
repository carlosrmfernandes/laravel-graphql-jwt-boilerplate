<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
class HgWeatherServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->singleton('App\Components\Weather\Contracts\HgWeatherInterface', function($app) {
            return new \App\Components\Weather\Strategies\HgWeatherStrategy($app->make('GuzzleHttp\Client'));
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

}
