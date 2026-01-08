<?php

namespace App\Livewire\Tenant\Invoice;

use App\Livewire\Tenant\Budget\Invoice;
use App\Models\Budget;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Invoice $invoice;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->invoice->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.tenant.invoice.delete');
    }
}
