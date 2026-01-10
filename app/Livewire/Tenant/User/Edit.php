<?php

namespace App\Livewire\Tenant\User;

use App\Models\TenantUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit Users')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    public TenantUser $user; // Objeto do usuário a ser editado

    public string $name = '';
    public string $email = '';
    public ?string $password = null;
    public ?string $password_confirmation = null;

    /**
     * Inicializa o componente
     */
    public function mount(int $id): void
    {
        $this->user = TenantUser::findOrFail($id);

        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    /**
     * Atualiza os dados do usuário
     */
    public function update(): void
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user->id),
            ],
            'password' => 'nullable|string|min:8|same:password_confirmation',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        toastr()->success('Usuário atualizado com sucesso!');

        redirect()->route('tenant.user.index');
    }

    /**
     * Renderiza a view do componente
     */
    public function render()
    {
        return view('livewire.tenant.user.edit');
    }
}
