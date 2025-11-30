<div>
    <div>
        <livewire:admin.budget-item.index :budget-id="$budget->id" wire:key="index-items" />

            <livewire:admin.budget.partial.edit-status :budgetId="$budget->id" wire:key="edit-status" />

            <livewire:admin.budget-item.create  :budgetId="$budget->id" wire:key="create-item-modal" />

            <livewire:admin.budget-item.edit  :budgetId="$budget->id"  wire:key="edit-item-modal" />

            <livewire:admin.budget-item.delete :budgetId="$budget->id"  wire:key="delete-item-modal" />

    </div>
</div>
