<?php

namespace App\Observers;

use App\Models\Expense;
use Illuminate\Support\Facades\Bus;

class ExpenseObserver
{
    public function created(Expense $expense): void
    {
        Bus::dispatchAfterResponse(function () use ($expense) {
            $expense->budget?->updateSummary();
        });
    }

    public function updated(Expense $expense): void
    {
        Bus::dispatchAfterResponse(function () use ($expense) {
            $expense->budget?->updateSummary();
        });
    }

    public function deleted(Expense $expense): void
    {
        Bus::dispatchAfterResponse(function () use ($expense) {
            $expense->budget?->updateSummary();
        });
    }
}
