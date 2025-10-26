<?php

namespace App\Livewire\Admin\Plan;

use App\Models\BudgetItem;
use App\Models\Plan;
use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{
    public $id;

    #[On('delete-plan')]
    public function setPlan($id)
    {
        $this->id = $id;
    }

    public function delete()
    {
        if ($this->id) {
            Plan::find($this->id)?->delete();

            $this->closeModal();
            $this->dispatch('refreshList');
        }
    }

    public function closeModal()
    {
        $this->dispatch('close-modal', name: 'delete-plan');
    }


    public function render()
    {
        return view('livewire.admin.plan.delete');
    }

}
