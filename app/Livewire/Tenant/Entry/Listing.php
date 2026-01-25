<?php

namespace App\Livewire\Tenant\Entry;

use App\Models\Budget;
use App\Models\BudgetTotal;
use App\Models\Entry;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Entry')]
#[Layout('layouts.tenant.admin')]
class Listing extends Component
{
    use WithPagination;

    public ?BudgetTotal $totals = null;

    public $budget;
    public $fileUrl;

//    public $showModal = false;
//    public $itemIdToDelete;
    private $id;


    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column' => 'created_at',
        'direction' => 'desc',
    ];

    public function mount(int $id): void
    {
        $this->budget = Budget::findOrFail($id);

        $this->totals = $this->budget->summary;

    }


    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Entry::query()
            ->with('budget')
            ->where('budget_id', $this->budget->id)
            ->when(
                $this->search !== null,
                fn($query) =>
                $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

//    public function openModal(int $id): void
//    {
//        $this->itemIdToDelete = $id;
//        $this->showModal = true;
//    }

//    #[On('close-modal')]
//    public function closeModal(): void
//    {
//        $this->showModal = false;
//    }
//    #[On('refresh-list')]
//    public function refreshList(): void
//    {
//        $this->resetPage();
//        $this->budget->refresh();
//        $this->closeModal();
//    }


    public function render()
    {

        return view('livewire.tenant.entry.listing');
    }
}
