<?php

namespace App\Providers;

use App\Models\BudgetItem;
use App\Models\BudgetTotal;
use App\Models\Entry;
use App\Models\Expense;
use App\Observers\BudgetItemObserver;
use App\Observers\BudgetTotalObserver;
use App\Observers\EntryObserver;
use App\Observers\ExpenseObserver;
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

        BudgetTotal::observe(BudgetTotalObserver::class);
        BudgetItem::observe(BudgetItemObserver::class);
        Expense::observe(ExpenseObserver::class);
        Entry::observe(EntryObserver::class);
    }
}
