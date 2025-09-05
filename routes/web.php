<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\Print\BudgetController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;

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



    //serviceproviders
    Route::get('/supplier/create', App\Livewire\Admin\ProductSupplier\Create::class)->name('supplier.create');
    Route::get('/supplier/{id}/edit', App\Livewire\Admin\ProductSupplier\Edit::class)->name('supplier.edit');
    Route::get('/supplier', App\Livewire\Admin\ProductSupplier\Index::class)->name('supplier.index');

    //serviceproviders
    Route::get('/provider/create', App\Livewire\Admin\ServiceProvider\Create::class)->name('provider.create');
    Route::get('/provider/{id}/edit', App\Livewire\Admin\ServiceProvider\Edit::class)->name('provider.edit');
    Route::get('/provider', App\Livewire\Admin\ServiceProvider\Index::class)->name('provider.index');


    // budget

    Route::get('/budget/{id}/print', [BudgetController::class, 'print'])->name('budget.print');
    Route::get('/budget/{id}/generate-pdf', [BudgetController::class, 'generatePDF'])->name('budget.pdf');

    Route::get('/budget/{id}/item', \App\Livewire\Admin\Budget\Items\ItemsList::class)->name('budget.item');
    Route::get('/budget/create', App\Livewire\Admin\Budget\Create::class)->name('budget.create');
    Route::get('/budget/{id}/edit', App\Livewire\Admin\Budget\Edit::class)->name('budget.edit');
    Route::get('/budgets', App\Livewire\Admin\Budget\Index::class)->name('budget.index');

    // product
    Route::get('/customer/create', App\Livewire\Admin\Customer\Create::class)->name('customer.create');
    Route::get('/customer/{id}/edit', App\Livewire\Admin\Customer\Edit::class)->name('customer.edit');
    Route::get('/customers', App\Livewire\Admin\Customer\Index::class)->name('customer.index');

    // product
    Route::get('/service/create', App\Livewire\Admin\Product\Create::class)->name('product.create');
    Route::get('/service/{id}/edit', App\Livewire\Admin\Product\Edit::class)->name('product.edit');
    Route::get('/services', App\Livewire\Admin\Product\Index::class)->name('product.index');

    // category
    Route::get('/category/create', App\Livewire\Admin\Category\Create::class)->name('category.create');
    Route::get('/category/{id}/edit', App\Livewire\Admin\Category\Edit::class)->name('category.edit');
    Route::get('/categories', App\Livewire\Admin\Category\Index::class)->name('category.index');

    // setting
    Route::get('/setting/{lang}', [App\Livewire\Admin\Setting\Locale::class, 'change'])->name("change.lang");
    Route::get('/setting/create', App\Livewire\Admin\Setting\Create::class)->name('setting.create');
    Route::get('/setting/{id}/edit', App\Livewire\Admin\Setting\Edit::class)->name('setting.edit');
    Route::get('/setting', App\Livewire\Admin\Setting\Index::class)->name('setting.index');

    // tenant
    Route::get('/tenant/create', App\Livewire\Admin\Tenant\Create::class)->name('tenant.create');
    Route::get('/tenant/{id}/edit', App\Livewire\Admin\Tenant\Edit::class)->name('tenant.edit');
    Route::get('/tenants', App\Livewire\Admin\Tenant\Index::class)->name('tenant.index');


    // profile
    Route::get('/profile', App\Livewire\Admin\Profile\Index::class)->name('profile.index');

    // user
    Route::get('/user/create', App\Livewire\Admin\User\Create::class)->name('user.create');
    Route::get('/user/{id}/edit', App\Livewire\Admin\User\Edit::class)->name('user.edit');
    Route::get('/users', App\Livewire\Admin\User\Index::class)->name('user.index');

    Route::get('/', App\Livewire\Admin\Home\Index::class)->name('admin');
});

require __DIR__.'/auth.php';

