<?php

namespace App\Livewire\Tenant\User;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Users')]
#[Layout('layouts.tenant.admin')]
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

        $user = User::findOrFail($id);
        $user->delete();

        toastr()->success('Usuário excluído com sucesso!');

        return redirect()->route('tenant.user.index');


    }

    #[On('searchData')]
    public function search($searchTerm)
    {
        $this->search = $searchTerm;
    }

    public function render()
    {
        $this->count = User::count();

        return view('livewire.tenant.user.index', [
            'datas' => User::search($this->search)->latest()->paginate($this->perPage)
        ]);
    }
}
