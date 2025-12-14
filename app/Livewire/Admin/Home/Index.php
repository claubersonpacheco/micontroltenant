<?php

namespace App\Livewire\Admin\Home;

use App\Models\Budget;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.admin.home.index');
    }
}
