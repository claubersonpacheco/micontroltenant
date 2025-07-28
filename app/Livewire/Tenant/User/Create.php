<?php

namespace App\Livewire\Tenant\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Title('Create Users')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{

    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function store()
    {
        // Aqui vai sua lógica de validação e criação do usuário, por exemplo:
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        toastr()->success('Criado com sucesso!');

        return redirect()->route('user.index');


    }

    public function render()
    {
        return view('livewire.tenant.user.create');
    }
}
