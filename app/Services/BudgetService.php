<?php

namespace App\Services;

use App\Models\Budget;

class BudgetService
{
    public static function updateTotals(int $budgetId): void
    {
        $budget = Budget::with('items')->findOrFail($budgetId);

        $budgetSubTotal = $budget->items->sum('subtotal');
        $budgetTotal    = $budget->items->sum('total');
        $budgetTax      = $budgetTotal - $budgetSubTotal;

        $budget->update([
            'subtotal'  => $budgetSubTotal,
            'total'     => $budgetTotal,
            'tax_value' => $budgetTax,
        ]);
    }
}
