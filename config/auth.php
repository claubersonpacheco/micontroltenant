<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        // Guard do central
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

        // Guard dos tenants
        'tenant' => [
            'driver' => 'session',
            'provider' => 'tenant_users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        // Usuários do central
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // Usuários dos tenants
        'tenant_users' => [
            'driver' => 'eloquent',
            'model' => App\Models\TenantUser::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Redirects (Laravel 12)
    |--------------------------------------------------------------------------
    |
    | Define para onde cada guard deve redirecionar quando não autenticado
    | (login) e depois de logado (home).
    |
    */
    'redirects' => [
        'login' => [
            'web' => '/admin/login',      // central
            'tenant' => '/login',   // tenant
        ],
        'home' => [
            'web' => '/admin',      // central
            'tenant' => '/dashboard',   // tenant
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],

        'tenant_users' => [
            'provider' => 'tenant_users',
            'table' => env('AUTH_TENANT_PASSWORD_RESET_TOKEN_TABLE', 'tenant_password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
