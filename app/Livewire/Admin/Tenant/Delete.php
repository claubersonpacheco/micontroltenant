<?php

namespace App\Livewire\Admin\Tenant;

use App\Models\Tenant;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Tenant $model;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->model->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.admin.tenant.delete');
    }
}
