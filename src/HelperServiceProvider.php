<?php
// File: src/HelperServiceProvider.php

namespace Laxmidhar\LaravelHelpers;

use Illuminate\Support\ServiceProvider;
use Laxmidhar\LaravelHelpers\Support\HelperService;

class HelperServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register the service in the container
        $this->app->singleton('laravel-helpers', function ($app) {
            return new HelperService();
        });

        // Also register under a more accessible alias
        $this->app->alias('laravel-helpers', HelperService::class);
    }

    public function boot()
    {
        // Load helper functions file if it exists
        $helperFile = __DIR__ . '/../helpers.php';
        if (file_exists($helperFile)) {
            require_once $helperFile;
        }
    }

    public function provides()
    {
        return ['laravel-helpers', HelperService::class];
    }
}
