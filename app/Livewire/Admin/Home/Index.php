<?php

namespace App\Livewire\Admin\Home;

use App\Models\Budget;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $budgets;

    public function mount()
    {
        $this->budgets = Budget::limit(10)->orderBy('id', 'desc')->get();
    }


    public function render()
    {
        return view('livewire.admin.home.index');
    }
}
