<?php

namespace App\Observers;

use App\Models\BudgetItem;
use Illuminate\Support\Facades\Bus;

class BudgetItemObserver
{
    public function created(BudgetItem $budgetItem): void
    {
        // Executa o updateSummary depois que a resposta for enviada
        Bus::dispatchAfterResponse(function () use ($budgetItem) {
            $budgetItem->budget?->updateSummary();
        });
    }

    public function updated(BudgetItem $budgetItem): void
    {
        Bus::dispatchAfterResponse(function () use ($budgetItem) {
            $budgetItem->budget?->updateSummary();
        });
    }

    public function deleted(BudgetItem $budgetItem): void
    {
        Bus::dispatchAfterResponse(function () use ($budgetItem) {
            $budgetItem->budget?->updateSummary();
        });
    }
}
