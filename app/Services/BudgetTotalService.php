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

            // IVA que será repassado à Hacienda
            $ivaToPay = (float) $totals->items_tax_total;

            // Valor total do orçamento (cliente paga)
            $gross = (float) $totals->items_subtotal + $ivaToPay;

            // Receita líquida antes do IVA e despesas
            $net = (float) $totals->items_subtotal - $expenses;

            // Diferença entre o que entrou e o orçamento total (cliente deve ou adiantou)
            $difference = $entries - $gross;

            // Lucro real (saldo após pagar despesas e IVA)
            $finalBalance = ($entries - $expenses) - $ivaToPay;

            // Margem de lucro real (em %)
            $profitMargin = $totals->items_subtotal > 0
                ? ($finalBalance / $totals->items_subtotal) * 100
                : 0;

            BudgetTotal::withoutEvents(function () use (
                $budgetId,
                $totals,
                $expenses,
                $entries,
                $gross,
                $net,
                $difference,
                $finalBalance,
                $profitMargin,
                $ivaToPay
            ) {
                BudgetTotal::updateOrCreate(
                    ['budget_id' => $budgetId],
                    [
                        'items_subtotal'   => $totals->items_subtotal,
                        'items_tax_total'  => $totals->items_tax_total,
                        'expenses_total'   => $expenses,
                        'entries_total'    => $entries,
                        'gross_total'      => $gross,
                        'net_total'        => $net,
                        'difference_total' => $difference,
                        'final_balance'    => $finalBalance,
                        'profit_margin'    => $profitMargin,
                        'iva_to_pay'       => $ivaToPay,
                    ]
                );
            });
        });
    }
}
