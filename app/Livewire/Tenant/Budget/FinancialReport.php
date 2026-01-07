<?php

namespace App\Livewire\Tenant\Budget;

use App\Models\Budget;
use App\Models\BudgetTotal;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Financial Report')]
#[Layout('layouts.tenant.admin')]
class FinancialReport extends Component
{
    public Budget $budget;
    public ?BudgetTotal $totals = null;

    public function mount(Budget $budget)
    {

        $this->budget = $budget;
        $this->totals = $budget->summary; // hasOne(BudgetTotal::class)
    }


    public function render()
    {
        return view('livewire.tenant.budget.financial-report');
    }
}
