<?php

namespace Premgthb\ExabytesSms;

use Illuminate\Support\ServiceProvider;
use Premgthb\ExabytesSms\Exabytes;

class ExabytesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/exabytes.php' => config_path('exabytes.php')
          ]);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/exabytes.php', 'exabytes');

        // Register the main class to use with the facade
        $this->app->singleton('exabytes', function($app){
            return new Exabytes();
          });
    }
}