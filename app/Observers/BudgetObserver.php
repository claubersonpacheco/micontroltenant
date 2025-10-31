<?php

namespace App\Observers;

use App\Models\Budget;
use App\Models\BudgetFilter;
use App\Models\Expense;

class BudgetObserver
{
    /**
     * Handle the Budget "created" event.
     */
    public function created(Budget $budget): void
    {
        BudgetFilter::create([
            'budget_id' => $budget->id,
        ]);
    }

    /**
     * Handle the Budget "deleted" event.
     */
    public function deleted(Budget $budget): void
    {
        //
    }


}
