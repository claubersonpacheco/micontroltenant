<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
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
        View::composer('*', function ($view) {
            $view->with('tenantSettings', setting());
        });

        $settings = (object) [
            'locale' => app()->getLocale(),
        ];

        // Compartilha com TODAS as views
        View::share('tenantSettings', $settings);

        // DEBUG
        logger()->info('TenantSettings carregado', (array) $settings);
    }
}
