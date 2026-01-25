<?php

namespace App\Livewire\Tenant\Email;

use App\Models\Budget;
use App\Models\Email;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('List Email')]
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
        return Email::query()
            ->when(
                $this->search !== null,
                fn($query) =>
                $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id): void
    {
        Email::findOrFail($id)->delete();
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.tenant.email.index');
    }
}
