<?php

namespace App\Livewire\Tenant\BudgetItem;

use App\Models\BudgetItem;
use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{
    public $itemId;

    #[On('delete-item')]
    public function setItem($id)
    {
        $this->itemId = $id;
    }

    public function delete()
    {
        if ($this->itemId) {
            BudgetItem::find($this->itemId)?->delete();

            $this->closeModal();
            $this->dispatch('refreshList');
        }
    }

    public function closeModal()
    {
        $this->dispatch('close-modal', name: 'delete-item');
    }


    public function render()
    {
        return view('livewire.tenant.budget-item.delete');
    }

}
