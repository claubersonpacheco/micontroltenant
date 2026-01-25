<?php

namespace App\Livewire\Tenant\Customer;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Title('List Customers')]
#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 5;
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
        return Customer::query()
            ->when(
                $this->search !== null,
                fn($query) =>
                $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function render()
    {
        return view('livewire.tenant.customer.index');
    }
}

