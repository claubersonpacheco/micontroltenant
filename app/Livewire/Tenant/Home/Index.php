<?php

namespace App\Livewire\Tenant\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.tenant.home.index');
    }
}
