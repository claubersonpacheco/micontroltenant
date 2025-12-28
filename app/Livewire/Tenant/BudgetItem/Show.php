<?php

namespace App\Livewire\Tenant\BudgetItem;

use App\Models\Budget;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Budget show')]
#[Layout('layouts.tenant.admin')]
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
