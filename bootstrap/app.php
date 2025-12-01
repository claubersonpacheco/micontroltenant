<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SetLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',

        using: function () {
            $centralDomain = config('tenancy.central_domains');
            foreach ($centralDomain as $domain) {
                Route::group([
                    'domain' => $domain,
                    'middleware' => 'web'
                ], base_path('routes/web.php'));
            }
            Route::group([
                'middleware' => [
                    'web',
                    \Stancl\Tenancy\Middleware\InitializeTenancyByDomain::class,
                    \Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains::class,
                    \Stancl\Tenancy\Middleware\ScopeSessions::class
                ]
            ], base_path('routes/tenant.php'));
        },

    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->group('universal', [
        ]);
        $middleware->web(append: [
            SetLocale::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
