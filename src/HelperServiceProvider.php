<?php

namespace Laxmidhar\LaravelHelpers;

use Illuminate\Support\ServiceProvider;
use Laxmidhar\LaravelHelpers\Support\HelperService;

class HelperServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register HelperService as singleton
        $this->app->singleton(HelperService::class, function () {
            return new HelperService();
        });

        // Register under 'laravel-helpers' key
        $this->app->singleton('laravel-helpers', HelperService::class);
    }

    public function boot(): void
    {
        // Load helper functions
        $this->loadHelpers();
    }

    protected function loadHelpers(): void
    {
        $helperFile = __DIR__ . '/helpers.php';
        if (file_exists($helperFile)) {
            require_once $helperFile;
        }
    }

    public function provides(): array
    {
        return ['laravel-helpers', HelperService::class];
    }
}
