<?php

declare(strict_types=1);

use App\Http\Controllers\Print\BudgetController;
use App\Http\Controllers\Tenant\Auth\EmailVerificationController;
use App\Http\Controllers\Tenant\Auth\LogoutController;
use App\Livewire\Tenant\Auth\Login;
use App\Livewire\Tenant\Auth\Passwords\Email;
use App\Livewire\Tenant\Auth\Passwords\Reset;
use App\Livewire\Tenant\Budget\FinancialReport;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Stancl\Tenancy\Middleware\ScopeSessions;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    ScopeSessions::class,
])->group(function () {

    //Auth::shouldUse('tenant');
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:tenant', 'verified']], function () {

        // entry
        Route::get('/entry/budget/{id}/pdf', [\App\Http\Controllers\Print\EntryPrint::class, 'generatePDF'])->name('tenant.entry.pdf');
        Route::get('/entry/budget/{id}/view', [\App\Http\Controllers\Print\EntryPrint::class, 'viewPrint'])->name('tenant.entry.view');
        Route::get('/entry/{id}/edit', App\Livewire\Tenant\Entry\Edit::class)->name('tenant.entry.edit');
        Route::get('/entry/budget/{id}/create', App\Livewire\Tenant\Entry\Create::class)->name('tenant.entry.create');
        Route::get('/entry/budget/{id}/list', App\Livewire\Tenant\Entry\Listing::class)->name('tenant.entry.budget.listing');
        Route::get('/entry', App\Livewire\Tenant\Entry\Index::class)->name('tenant.entry.index');

        // expense
        Route::get('/expense/budget/{id}/pdf', [\App\Http\Controllers\Print\ExpensePrint::class, 'generatePDF'])->name('tenant.expense.pdf');
        Route::get('/expense/budget/{id}/view', [\App\Http\Controllers\Print\ExpensePrint::class, 'viewPrint'])->name('tenant.expense.view');
        Route::get('/expense/budget/{id}/edit', App\Livewire\Tenant\Expense\Edit::class)->name('tenant.expense.edit');
        Route::get('/expense/budget/{id}/create', App\Livewire\Tenant\Expense\Create::class)->name('tenant.expense.create');
        Route::get('/expense/budget/{id}/list', App\Livewire\Tenant\Expense\Listing::class)->name('tenant.expense.budget.listing');
        Route::get('/expense', App\Livewire\Tenant\Expense\Index::class)->name('tenant.expense.index');

        // invoice
        Route::get('/invoice/create/{customer}/customer', App\Livewire\Tenant\Invoice\Index::class)->name('tenant.invoice.create.customer');
        Route::get('/invoice', App\Livewire\Tenant\Invoice\Index::class)->name('tenant.invoice.index');

        // supplier
        Route::get('/supplier/create', App\Livewire\Tenant\Supplier\Create::class)->name('tenant.supplier.create');
        Route::get('/supplier/{id}/edit', App\Livewire\Tenant\Supplier\Edit::class)->name('tenant.supplier.edit');
        Route::get('/supplier', App\Livewire\Tenant\Supplier\Index::class)->name('tenant.supplier.index');

        // freelancer
        Route::get('/freelancer/create', App\Livewire\Tenant\Freelancer\Create::class)->name('tenant.freelancer.create');
        Route::get('/freelancer/{id}/edit', App\Livewire\Tenant\Freelancer\Edit::class)->name('tenant.freelancer.edit');
        Route::get('/freelancer', App\Livewire\Tenant\Freelancer\Index::class)->name('tenant.freelancer.index');

        // email
        Route::get('/email/{id}/send', App\Livewire\Tenant\Email\Send::class)->name('tenant.email.send');
        Route::get('/email/{id}/view', App\Livewire\Tenant\Email\View::class)->name('tenant.email.view');
        Route::get('/email/create', App\Livewire\Tenant\Email\Create::class)->name('tenant.email.create');
        Route::get('/emails', App\Livewire\Tenant\Email\Index::class)->name('tenant.email.index');

        // budget
        Route::get('/budgets/{id}/invoice', App\Livewire\Tenant\Budget\Invoice::class)->name('tenant.budget.invoice');
        Route::get('/budgets/{id}/print', [BudgetController::class, 'print'])->name('tenant.budget.print');
        Route::get('/budgets/{id}/generate-pdf', [BudgetController::class, 'generatePDF'])->name('tenant.budget.pdf');

        Route::get('/budgets/{budget}/financial-report', FinancialReport::class)->name('tenant.budgets.financial-report');

        // budget-item
        Route::get('/budgets/{budgetId}/item', App\Livewire\Tenant\BudgetItem\Show::class)->name('tenant.budget.item.show');

        // budget
        Route::get('/budgets/{id}/delete', App\Livewire\Tenant\Budget\Delete::class)->name('tenant.budget.delete');
        Route::get('/budgets/create', App\Livewire\Tenant\Budget\Create::class)->name('tenant.budget.create');
        Route::get('/budgets/{id}/edit', App\Livewire\Tenant\Budget\Edit::class)->name('tenant.budget.edit');
        Route::get('/budgets', App\Livewire\Tenant\Budget\Index::class)->name('tenant.budget.index');

        // customer
        Route::get('/customer/create', App\Livewire\Tenant\Customer\Create::class)->name('tenant.customer.create');
        Route::get('/customer/{id}/edit', App\Livewire\Tenant\Customer\Edit::class)->name('tenant.customer.edit');
        Route::get('/customers', App\Livewire\Tenant\Customer\Index::class)->name('tenant.customer.index');

        // services/products
        Route::get('/service/create', App\Livewire\Tenant\Product\Create::class)->name('tenant.product.create');
        Route::get('/service/{id}/edit', App\Livewire\Tenant\Product\Edit::class)->name('tenant.product.edit');
        Route::get('/services', App\Livewire\Tenant\Product\Index::class)->name('tenant.product.index');

        // category
        Route::get('/category/create', App\Livewire\Tenant\Category\Create::class)->name('tenant.category.create');
        Route::get('/category/{id}/edit', App\Livewire\Tenant\Category\Edit::class)->name('tenant.category.edit');
        Route::get('/categories', App\Livewire\Tenant\Category\Index::class)->name('tenant.category.index');

        // setting
        Route::get('/setting/{lang}/lang', [App\Livewire\Tenant\Setting\Locale::class, 'change'])->name('tenant.change.lang');
        Route::get('/setting/create', App\Livewire\Tenant\Setting\Create::class)->name('tenant.setting.create');
        Route::get('/setting/{id}/edit', App\Livewire\Tenant\Setting\Edit::class)->name('tenant.setting.edit');
        Route::get('/setting', App\Livewire\Tenant\Setting\Index::class)->name('tenant.setting.index');

        // profile
        Route::get('/profile', App\Livewire\Tenant\Profile\Index::class)->name('tenant.profile.index');

        // users
        Route::get('/user/create', App\Livewire\Tenant\User\Create::class)->name('tenant.user.create');
        Route::get('/user/{id}/edit', App\Livewire\Tenant\User\Edit::class)->name('tenant.user.edit');
        Route::get('/users', App\Livewire\Tenant\User\Index::class)->name('tenant.user.index');

        // dashboard
        Route::get('/', App\Livewire\Tenant\Home\Index::class)->name('tenant.dashboard');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas de convidados
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => 'guest:tenant'], function () {
        Route::get('/login', Login::class)->name('tenant.login');
        Route::get('/', App\Livewire\Tenant\Index::class)->name('tenant.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Rotas autenticadas fora do dashboard
    |--------------------------------------------------------------------------
    */
    Route::group(['middleware' => 'auth:tenant'], function () {
        // Rotas de recuperação/verificação de senha para admin
        Route::get('/tenant/password/reset', Email::class)->name('password.request');
        Route::get('/tenant/password/reset/{token}', Reset::class)->name('password.reset');

        Route::get('/tenant/email/verify/{id}/{hash}', EmailVerificationController::class)->name('tenant.verification.verify');
        Route::post('/tenant/logout', LogoutController::class)->name('tenant.logout');
    });

});
