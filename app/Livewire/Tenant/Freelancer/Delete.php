<?php

namespace App\Livewire\Tenant\Freelancer;

use App\Models\Freelancer;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Freelancer $freelancer;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->freelancer->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.tenant.freelancer.delete');
    }
}
