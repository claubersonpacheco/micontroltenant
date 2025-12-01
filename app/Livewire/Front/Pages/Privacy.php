<?php

namespace App\Livewire\Front\Pages;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.front.app')]
class Privacy extends Component
{
    public function render()
    {
        return view('livewire.front.pages.privacy');
    }
}
