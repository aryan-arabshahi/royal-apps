<?php

namespace App\Providers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        $this->publishes([
            resource_path('css') => public_path('/assets/css'),
            resource_path('js')  => public_path('/assets/js'),
            resource_path('fonts')  => public_path('/assets/fonts'),
        ], 'assets');

        Http::macro('symfonySkeleton', function () {
            return Http::baseUrl(env('SYMFONY_SKELETON_API_BASE_URL'));
        });
    }
}
