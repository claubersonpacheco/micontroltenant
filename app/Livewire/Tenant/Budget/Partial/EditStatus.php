<?php

namespace App\Livewire\Admin\Budget\Partial;

use App\Models\BudgetStatus;
use Livewire\Attributes\On;
use Livewire\Component;

class EditStatus extends Component
{

    public $status;
    public $comments;
    public $statuses = [];

    public $budgetId;


    public function mount($budgetId)
    {

        $this->budgetId = $budgetId;


        $budgetStatus = BudgetStatus::where('budget_id',  $this->budgetId )->first();

        $this->status = $budgetStatus?->status;
        $this->comments = $budgetStatus?->comments;

        // Pega as opções direto do model
        $this->statuses = BudgetStatus::getStatusOptions();
    }

    public function updateStatus()
    {
        $this->validate([
            'status' => 'required|integer',
            'comments' => 'nullable|string',
        ]);

        BudgetStatus::updateOrCreate(
            ['budget_id' => $this->budgetId ], // <- cuidado, precisa ter $budgetId
            [
                'status' => $this->status,
                'comments' => $this->comments,
                'changed_by' => auth()->id(),
            ]
        );

        $this->dispatch('refreshList');
        $this->closeModal();
    }

    public function closeModal()
    {
        $this->dispatch('close-modal', name: 'edit-status');
    }

    public function render()
    {
        return view('livewire.admin.budget.partial.edit-status');
    }

}
