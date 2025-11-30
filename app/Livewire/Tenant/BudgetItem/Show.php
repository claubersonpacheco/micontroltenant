<?php

namespace App\Livewire\Admin\BudgetItem;

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
        return view('livewire.admin.budget-item.show');
    }
}
