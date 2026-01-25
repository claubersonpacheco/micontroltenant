<?php

namespace App\Livewire\Tenant\Freelancer;

use App\Models\Freelancer;
use Livewire\Attributes\On;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Title('List Users')]
#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
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
        return Freelancer::query()
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id): void
    {
        Freelancer::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.tenant.freelancer.index');
    }
}

