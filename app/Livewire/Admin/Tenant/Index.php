<?php

namespace App\Livewire\Admin\Tenant;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;
#[Title('List Tenants')]
#[Layout('layouts.admin.admin')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 5;

    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $sortBy = 'name';
    public $sortByDesc = true;

    public $status;

    public $count;

    public $users;


    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Tenant::query()
            ->whereNotIn('id', [Auth::id()])
            ->when($this->search !== null, fn (Builder $query) => $query->whereAny(['name', 'email'], 'like', '%'.trim($this->search).'%'))
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function render()
    {
        $this->count = User::count();

        return view('livewire.admin.tenant.index');
    }
}
