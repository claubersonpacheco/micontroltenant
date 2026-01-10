<?php

namespace App\Livewire\Tenant\User;

use App\Models\TenantUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Users')]
#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public int $perPage = 25;
    public string $search = '';

    public string $sortField = 'name';
    public string $sortDirection = 'asc';

    public int $count = 0;

    /**
     * Reset pagination when search changes
     */
    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    /**
     * Listen search event (ex: from input component)
     */
    #[On('searchData')]
    public function search(string $searchTerm): void
    {
        $this->search = $searchTerm;
    }

    /**
     * Change ordering
     */
    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    /**
     * Delete tenant user
     */
    public function delete(int $id): void
    {
        TenantUser::findOrFail($id)->delete();

        toastr()->success('Usuário excluído com sucesso!');

        $this->resetPage();
        $this->count = TenantUser::count();
    }

    /**
     * Initial load
     */
    public function mount(): void
    {
        $this->count = TenantUser::count();
    }

    public function render()
    {
        $users = TenantUser::query()
            ->search($this->search)
            ->whereNotIn('id', [Auth::id()])
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.tenant.user.index', [
            'datas' => $users,
        ]);
    }
}
