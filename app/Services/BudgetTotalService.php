<?php

namespace App\Services;

use App\Models\BudgetTotal;
use Illuminate\Support\Facades\DB;

class BudgetTotalService
{
    public static function updateTotals(int $budgetId): void
    {
        DB::transaction(function () use ($budgetId) {
            $totals = DB::table('budget_items')
                ->selectRaw('
                    COALESCE(SUM(price * quantity), 0) AS items_subtotal,
                    COALESCE(SUM(tax_value), 0) AS items_tax_total
                ')
                ->where('budget_id', $budgetId)
                ->first();

            $expenses = DB::table('expenses')
                ->where('budget_id', $budgetId)
                ->sum('amount');

            $entries = DB::table('entries')
                ->where('budget_id', $budgetId)
                ->sum('amount');

            $gross = $totals->items_subtotal + $totals->items_tax_total + $expenses;
            $net = $gross - $entries;
            $difference = $entries - $gross;

            BudgetTotal::withoutEvents(function () use (
                $budgetId,
                $totals,
                $expenses,
                $entries,
                $gross,
                $net,
                $difference
            ) {
                BudgetTotal::updateOrCreate(
                    ['budget_id' => $budgetId],
                    [
                        'items_subtotal' => $totals->items_subtotal,
                        'items_tax_total' => $totals->items_tax_total,
                        'expenses_total' => $expenses,
                        'entries_total' => $entries,
                        'gross_total' => $gross,
                        'net_total' => $net,
                        'difference_total' => $difference,
                        'final_balance' => $difference,
                    ]
                );
            });
        });
    }
}

