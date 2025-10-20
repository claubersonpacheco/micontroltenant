<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use Livewire\Component;
use App\Traits\Alert;
use App\Models\User;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Budget $budget;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->budget->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.admin.budget.delete');
    }
}
