<div>
    <div>
        <livewire:tenant.budget-item.index :budget-id="$budget->id" wire:key="index-items" />

            <livewire:tenant.budget.partial.edit-status :budgetId="$budget->id" wire:key="edit-status" />

            <livewire:tenant.budget-item.create  :budgetId="$budget->id" wire:key="create-item-modal" />

            <livewire:tenant.budget-item.edit  :budgetId="$budget->id"  wire:key="edit-item-modal" />

            <livewire:tenant.budget-item.delete :budgetId="$budget->id"  wire:key="delete-item-modal" />

    </div>
</div>
