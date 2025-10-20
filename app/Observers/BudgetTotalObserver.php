<?php

namespace App\Observers;

use App\Models\BudgetTotal;

class BudgetTotalObserver
{
    protected static bool $updating = false;

    public function updated(BudgetTotal $total)
    {
        if (self::$updating) {
            return;
        }

        self::$updating = true;
        try {
            $total->budget?->updateSummary();
        } finally {
            self::$updating = false;
        }
    }
}

