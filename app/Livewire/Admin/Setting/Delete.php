<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Setting $model;

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
        return view('livewire.admin.setting.delete');
    }
}
