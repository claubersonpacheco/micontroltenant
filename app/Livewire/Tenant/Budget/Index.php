<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Budgets')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 25;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Budget::query()
            ->with([
                'customer:id,name',
                'latestStatus',
                'summary'
            ])
            ->when($this->search !== null, fn ($query) =>
                $query->whereHas('customer', fn ($q) =>
                    $q->where('name', 'like', '%' . trim($this->search) . '%')
                )
            )
            ->select(['id', 'name', 'customer_id', 'date', 'created_at'])
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function render()
    {
        return view('livewire.admin.budget.index');
    }
}

