<?php

namespace App\Livewire\Tenant\BudgetItem;

use App\Models\Budget;
use Livewire\Component;

class Show extends Component
{

    public $budget;

    public function mount(Budget  $budgetId)
    {
        $this->budget = $budgetId;
    }

    public function render()
    {
        return view('livewire.tenant.budget-item.show');
    }
}
