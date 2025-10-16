<?php

namespace Laxmidhar\LaravelHelpers;

use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Merge config
        // $this->mergeConfigFrom(
        //     __DIR__ . '/../config/helpers.php',
        //     'helpers'
        // );

        // Register the service
        $this->app->singleton('laravel-helpers', function ($app) {
            return new Support\HelperService();
        });
    }

    public function boot()
    {
        // Publish config
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/helpers.php' => config_path('helpers.php'),
            ], 'helpers-config');
        }

        // // Register custom facade alias if configured
        $customAlias = config('helpers.facade_alias');
        if ($customAlias && $customAlias !== 'Helper') {
            $this->app->alias('laravel-helpers', $customAlias);
        }
    }

    public function provides()
    {
        // return ['laravel-helpers'];
    }
}
