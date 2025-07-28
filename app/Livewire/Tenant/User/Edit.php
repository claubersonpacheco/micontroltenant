<?php

namespace App\Livewire\Tenant\User;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

#[Title('Edit Users')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    public $user; // Objeto do usuário a ser editado
    public $userId; // ID do usuário
    public $name; // Nome do usuário
    public $email; // Email do usuário
    public $password; // Nova senha
    public $password_confirmation; // Confirmação de senha

    // Método chamado ao inicializar o componente
    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->userId = $this->user->id;
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    // Método para atualizar os dados do usuário
    public function update()
    {
        $user = User::findOrFail($this->userId);

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|min:8|same:password_confirmation',
        ]);

        $user->name = $this->name;
        $user->email = $this->email;

        // Atualiza a senha apenas se um novo valor for informado
        if ($this->password) {
            $user->password = Hash::make($this->password);
        }

        $user->save();

        // Mensagem de sucesso para o usuário
        toastr()->success('Usuário atualizado com sucesso!');

        return redirect()->route('user.index');
    }

    // Renderiza a view associada ao componente
    public function render()
    {
        return view('livewire.tenant.user.edit');
    }
}
