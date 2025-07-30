<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\Auth\EmailVerificationController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Passwords\Confirm;
use App\Livewire\Admin\Auth\Passwords\Email;
use App\Livewire\Admin\Auth\Passwords\Reset;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Auth\Verify;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyBySubdomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

// routes/web.php ou routes/central.php

Route::get('/check', function () {
    return response()->json([
        'tenant_initialized' => tenancy()->initialized,
        'tenant_id' => tenant()?->id,
    ]);
});



        Route::view('/', 'welcome')->name('home');

        // Painel admin protegido
        Route::prefix('admin')->middleware('auth:admin')->group(function () {

            // setting
            Route::get('/setting/create', App\Livewire\Admin\Setting\Create::class)->name('setting.create');
            Route::get('/setting/{id}/edit', App\Livewire\Admin\Setting\Edit::class)->name('setting.edit');
            Route::get('/setting', App\Livewire\Admin\Setting\Index::class)->name('setting.index');

            // tenant
            Route::get('/tenant/create', App\Livewire\Admin\Tenant\Create::class)->name('tenant.create');
            Route::get('/tenant/{id}/edit', App\Livewire\Admin\Tenant\Edit::class)->name('tenant.edit');
            Route::get('/tenants', App\Livewire\Admin\Tenant\Index::class)->name('tenant.index');


            // user
            Route::get('/user/create', App\Livewire\Admin\User\Create::class)->name('user.create');
            Route::get('/user/{id}/edit', App\Livewire\Admin\User\Edit::class)->name('user.edit');
            Route::get('/users', App\Livewire\Admin\User\Index::class)->name('user.index');

            Route::get('/', App\Livewire\Admin\Home\Index::class)->name('admin');
        });

require __DIR__.'/auth.php';

