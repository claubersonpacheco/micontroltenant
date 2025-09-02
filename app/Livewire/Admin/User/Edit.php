<?php

namespace App\Livewire\Admin\User;

use Illuminate\Contracts\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

#[Title('Edit Users')]
class Edit extends Component
{
    public $code;
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
        $this->code = $this->user->code;
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
                'string',
                'max:255',
                'unique:users,email,' . $this->user->id
            ],
            'password' => [
                'nullable',
                'string',
                'confirmed',
                Rules\Password::defaults()
            ]
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
        return view('livewire.admin.user.edit');
    }
}
