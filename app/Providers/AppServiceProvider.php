<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

use Livewire\Livewire;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\BudgetTotal;
use App\Models\Entry;
use App\Models\Expense;

use App\Observers\BudgetItemObserver;
use App\Observers\BudgetObserver;
use App\Observers\BudgetTotalObserver;
use App\Observers\EntryObserver;
use App\Observers\ExpenseObserver;
use Illuminate\Auth\Middleware\Authenticate;
class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Authenticate::redirectUsing(function ($request) {
            $host = $request->getHost();

            // se o host contém .micontrol.test → é tenant
            if (str_contains($host, config('tenancy.central_domains')[0])) {
                return $request->getSchemeAndHttpHost() . '/login';
            }

            // fallback para central
            return $request->getSchemeAndHttpHost() . '/admin/login';
        });
        /*
        |--------------------------------------------------------------------------
        | Compartilha settings com TODAS as views
        |--------------------------------------------------------------------------
        */
        View::composer('*', function ($view) {
            $view->with('tenantSettings', setting());
        });

        $settings = (object) [
            'locale' => app()->getLocale(),
        ];

        View::share('tenantSettings', $settings);

        /*
        |--------------------------------------------------------------------------
        | Observers
        |--------------------------------------------------------------------------
        */
        BudgetTotal::observe(BudgetTotalObserver::class);
        BudgetItem::observe(BudgetItemObserver::class);
        Expense::observe(ExpenseObserver::class);
        Entry::observe(EntryObserver::class);
        Budget::observe(BudgetObserver::class);

    }
}
