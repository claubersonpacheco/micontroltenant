<?php

namespace App\Livewire\Tenant\Home;

use App\Models\Budget;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    public $budgets;

    public function mount()
    {
        $this->budgets = Budget::with('customer:id,name')
            ->latest()
            ->limit(10)
            ->get();
    }
    public function render()
    {
        return view('livewire.tenant.home.index');
    }
}
