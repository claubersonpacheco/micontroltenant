<?php

namespace App\Livewire\Tenant\Budget;

use App\Models\Budget;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Title('List Budgets')]
#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 25;
    public ?string $search = null;

    public array $sort = [
        'column' => 'created_at',
        'direction' => 'desc',
    ];

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Budget::query()
            ->with([
                'customer:id,name',
                'latestStatus',
                'summary'
            ])
            ->when(
                $this->search !== null,
                fn($query) =>
                $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->select(['id', 'name', 'customer_id', 'date', 'created_at'])
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function render()
    {
        return view('livewire.tenant.budget.index');
    }
}

