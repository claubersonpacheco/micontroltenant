<?php

namespace App\Livewire\Admin\Tenant;

use App\Models\Tenant;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Tenants')]
#[Layout('layouts.admin.admin')]
class Index extends Component
{
    use WithPagination;

    public $perPage = 25;

    public $search = '';

    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $sortBy = 'name';
    public $sortByDesc = true;

    public $status;

    public $count;

    public $users;


    public function delete($id)
    {

        $user = Tenant::findOrFail($id);
        $user->delete();

        toastr()->success('Excluído com sucesso!');

        return redirect()->route('tenant.index');


    }

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    public function render()
    {
        $this->count = User::count();

        return view('livewire.admin.tenant.index', [
            'datas' => Tenant::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }
}
