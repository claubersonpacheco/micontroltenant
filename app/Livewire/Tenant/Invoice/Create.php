<?php

namespace App\Livewire\Tenant\Invoice;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Invoice')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    public function render()
    {
        return view('livewire.tenant.invoice.create');
    }
}
