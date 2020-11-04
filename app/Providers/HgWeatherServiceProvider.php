<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client as GuzzleClient;
use App\Components\Weather\Client;
use App\Components\Weather\Strategies\HgWeatherStrategy;

class HgWeatherServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            $config = config('hgWeather');
            $client = new GuzzleClient([
                'base_uri' => $config['base_uri'],
            ]);
            return new Client(new HgWeatherStrategy($client));
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
