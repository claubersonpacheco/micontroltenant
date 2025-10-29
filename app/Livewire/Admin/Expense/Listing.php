<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Budget;
use App\Models\BudgetTotal;
use App\Models\Expense;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Listing Expense')]
class Listing extends Component
{
    use WithPagination;

    public $budget;

    public ?BudgetTotal $totals = null;

    public $showModal = false;
    public $itemIdToDelete;

    private $id;

    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    public function mount(int $id): void
    {
        $this->budget = Budget::with('summary')->findOrFail($id);
        $this->totals = $this->budget->summary;

    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Expense::query()
            ->with('budget')
            ->where('budget_id', $this->budget->id)
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function openModal(int $id): void
    {
        $this->itemIdToDelete = $id;
        $this->showModal = true;

    }

    #[On('closeModal')]
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.admin.expense.listing');
    }
}
