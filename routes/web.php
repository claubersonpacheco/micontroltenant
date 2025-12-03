<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\Print\BudgetController;
use App\Livewire\Admin\Budget\FinancialReport;
use Illuminate\Support\Facades\Route;

// routes/web.php ou routes/central.php


Route::get('/', \App\Livewire\Front\Pages\Index::class)->name('index');
Route::get('/privacy-policy', \App\Livewire\Front\Pages\Privacy::class)->name('privacy');

// Painel admin protegido
Route::prefix('admin')->middleware(['auth:web', 'verified'])->group(function () {


    //Invoice
    Route::get('/invoice/create/{customer}/customer', App\Livewire\Admin\Invoice\Index::class)->name('invoice.create.customer');
    Route::get('/invoice', App\Livewire\Admin\Invoice\Index::class)->name('invoice.index');

    // email
    Route::get('/email/{id}/send', App\Livewire\Admin\Email\Send::class)->name('email.send');
    Route::get('/email/{id}/view', App\Livewire\Admin\Email\View::class)->name('email.view');
    Route::get('/email/create', App\Livewire\Admin\Email\Create::class)->name('email.create');
    Route::get('/emails', App\Livewire\Admin\Email\Index::class)->name('email.index');

    // setting
    Route::get('/setting/{lang}/lang', [App\Livewire\Admin\Setting\Locale::class, 'change'])->name("change.lang");
    Route::get('/setting/create', App\Livewire\Admin\Setting\Create::class)->name('setting.create');
    Route::get('/setting/{id}/edit', App\Livewire\Admin\Setting\Edit::class)->name('setting.edit');
    Route::get('/setting', App\Livewire\Admin\Setting\Index::class)->name('setting.index');

    // tenant
    Route::get('/tenant/create', App\Livewire\Admin\Tenant\Create::class)->name('tenant.create');
    Route::get('/tenant/{id}/edit', App\Livewire\Admin\Tenant\Edit::class)->name('tenant.edit');
    Route::get('/tenants', App\Livewire\Admin\Tenant\Index::class)->name('tenant.index');

    // Plan
    Route::get('/plans/create', App\Livewire\Admin\Plan\Create::class)->name('plan.create');
    Route::get('/plans/{id}/edit', App\Livewire\Admin\Plan\Edit::class)->name('plan.edit');
    Route::get('/plans', App\Livewire\Admin\Plan\Index::class)->name('plan.index');

    // profile
    Route::get('/profile', App\Livewire\Admin\Profile\Index::class)->name('profile.index');

    // user
    Route::get('/user/create', App\Livewire\Admin\User\Create::class)->name('user.create');
    Route::get('/user/{id}/edit', App\Livewire\Admin\User\Edit::class)->name('user.edit');
    Route::get('/users', App\Livewire\Admin\User\Index::class)->name('user.index');

    Route::get('/', App\Livewire\Admin\Home\Index::class)->name('admin');
});

require __DIR__ . '/auth.php';
