<?php

declare(strict_types=1);

use App\Http\Controllers\Tenant\Auth\EmailVerificationController;
use App\Http\Controllers\Tenant\Auth\LogoutController;
use App\Livewire\Tenant\Auth\Login;
use App\Livewire\Tenant\Auth\Register;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

//    Route::get('/', function () {
//
//
//        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
//    });


    Route::prefix('dashboard')->middleware('auth:web')
        ->group(function () {

            # Users
            Route::get('/user/create', App\Livewire\Tenant\User\Create::class)->name('tenant.user.create');
            Route::get('/user/{id}/edit', App\Livewire\Tenant\User\Edit::class )->name('tenant.user.edit');
            Route::get('/users', App\Livewire\Tenant\User\Index::class)->name('tenant.user.index');

            Route::get('/', App\Livewire\Tenant\Home\Index::class)->name('dashboard');
        });


    Route::middleware('guest')->group(function () {
        Route::get('/', Login::class)
            ->name('tenant.login');

//        Route::get('register', Register::class)
//            ->name('register');
    });

    Route::middleware('auth')->group(function () {
        Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
            ->middleware('signed')
            ->name('tenant.verification.verify');

        Route::post('logout', LogoutController::class)
            ->name('tenant.logout');
    });


});
