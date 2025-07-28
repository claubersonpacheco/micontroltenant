<?php

namespace App\Livewire\Admin\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.admin')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.home.index');
    }
}
