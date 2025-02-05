<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
{
    // Force Laravel to use the correct base URL
    URL::forceRootUrl(config('app.url'));

    // Force HTTPS if applicable
    if (str_contains(config('app.url'), 'https://')) {
        URL::forceScheme('https');
    }
}
}
