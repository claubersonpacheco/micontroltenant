<?php

namespace App\Livewire\Tenant\User;

use App\Models\User;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public User $user;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->user->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.tenant.user.delete');
    }
}
