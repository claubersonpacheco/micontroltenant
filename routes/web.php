<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\Print\BudgetController;
use App\Livewire\Admin\Budget\FinancialReport;
use Illuminate\Support\Facades\Route;

// routes/web.php ou routes/central.php

Route::get('/check', function () {
    return response()->json([
        'tenant_initialized' => tenancy()->initialized,
        'tenant_id' => tenant()?->id,
    ]);
});



Route::view('/', 'welcome')->name('home');

// Painel admin protegido
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {

    // entry
    Route::get('/entry/budget/{id}/view', App\Livewire\Admin\Entry\Create::class)->name('entry.view');
    Route::get('/entry/budget/{id}/edit', App\Livewire\Admin\Entry\Edit::class)->name('entry.edit');
    Route::get('/entry/budget/{id}/create', App\Livewire\Admin\Entry\Create::class)->name('entry.create');
    Route::get('/entry/budget/{id}/list', App\Livewire\Admin\Entry\Listing::class)->name('entry.budget.listing');
    Route::get('/entry', App\Livewire\Admin\Entry\Index::class)->name('entry.index');

    // expense

    Route::get('/expense/budget/{id}/pdf', [\App\Http\Controllers\Admin\Print\ExpensePrint::class, 'generatePDF'])->name('expense.pdf');
    Route::get('/expense/budget/{id}/view', [\App\Http\Controllers\Admin\Print\ExpensePrint::class, 'viewPrint'])->name('expense.view');
    Route::get('/expense/budget/{id}/edit', App\Livewire\Admin\Expense\Edit::class)->name('expense.edit');
    Route::get('/expense/budget/{id}/create', App\Livewire\Admin\Expense\Create::class)->name('expense.create');
    Route::get('/expense/budget/{id}/list', App\Livewire\Admin\Expense\Listing::class)->name('expense.budget.listing');
    Route::get('/expense', App\Livewire\Admin\Expense\Index::class)->name('expense.index');
    //Invoice
    Route::get('/invoice/create/{customer}/customer', App\Livewire\Admin\Invoice\Index::class)->name('invoice.create.customer');
    Route::get('/invoice', App\Livewire\Admin\Invoice\Index::class)->name('invoice.index');

    //supplier
    Route::get('/supplier/create', App\Livewire\Admin\Supplier\Create::class)->name('supplier.create');
    Route::get('/supplier/{id}/edit', App\Livewire\Admin\Supplier\Edit::class)->name('supplier.edit');
    Route::get('/supplier', App\Livewire\Admin\Supplier\Index::class)->name('supplier.index');

    //freelancer
    Route::get('/freelancer/create', App\Livewire\Admin\Freelancer\Create::class)->name('freelancer.create');
    Route::get('/freelancer/{id}/edit', App\Livewire\Admin\Freelancer\Edit::class)->name('freelancer.edit');
    Route::get('/freelancer', App\Livewire\Admin\Freelancer\Index::class)->name('freelancer.index');

    // email
    Route::get('/email/{id}/send', App\Livewire\Admin\Email\Send::class)->name('email.send');
    Route::get('/email/{id}/view', App\Livewire\Admin\Email\View::class)->name('email.view');
    Route::get('/email/create', App\Livewire\Admin\Email\Create::class)->name('email.create');
    Route::get('/emails', App\Livewire\Admin\Email\Index::class)->name('email.index');

    // budget
    Route::get('/budget/{id}/invoice', App\Livewire\Admin\Budget\Invoice::class)->name('budget.invoice');
    Route::get('/budget/{id}/print', [BudgetController::class, 'print'])->name('budget.print');
    Route::get('/budget/{id}/generate-pdf', [BudgetController::class, 'generatePDF'])->name('budget.pdf');

    Route::get('/budgets/{budget}/financial-report', FinancialReport::class)
        ->name('budgets.financial-report');

    // budget-item
    Route::get('/budget/{budgetId}/item', App\Livewire\Admin\BudgetItem\Show::class)->name('budget.item.show');

    // budget
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

require __DIR__.'/auth.php';

