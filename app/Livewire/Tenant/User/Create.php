<?php

namespace App\Livewire\Tenant\User;

use App\Models\TenantUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Users')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    public string $name = '';
    public string $email = '';
    public ?string $password = null;
    public ?string $password_confirmation = null;

    /**
     * Cria um novo usuário do tenant
     */
    public function store(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        TenantUser::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        toastr()->success('Usuário criado com sucesso!');

        redirect()->route('tenant.user.index');
    }

    /**
     * Renderiza a view do componente
     */
    public function render()
    {
        return view('livewire.tenant.user.create');
    }
}
