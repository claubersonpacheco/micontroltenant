<?php

namespace App\Livewire\Admin\Budget;

use App\Models\BudgetItem;
use App\Models\Budget;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Budget Items')]
class Item extends Component
{
    use WithPagination;

    public ?Budget $budget = null;
    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    #[On('listItems')]
    public function mount($id)
    {
        $this->budget = Budget::find($id);

        if (!$this->budget) {
            abort(404);
        }
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return BudgetItem::query()
            ->where('budget_id', $this->budget->id)
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['description', 'email'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id): void
    {
        BudgetItem::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.budget.item', [
            'budget' => $this->budget,  // passa o orçamento para a view
            'rows' => $this->rows,      // passa os itens para a view
        ]);
    }
}
