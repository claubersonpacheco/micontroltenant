<?php

namespace App\Livewire\Admin\User;

use App\Livewire\Forms\UserForm;
use App\Models\User;
use App\Traits\GenerateAutomaticCode;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Title('Create Users')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public ?string $code = null;
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;

    public function store()
    {
        // Aqui vai sua lógica de validação e criação do usuário, por exemplo:
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'code'  => $this->code,
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        toastr()->success('Criado com sucesso!');
        return redirect()->route('user.index');

    }

    public function render()
    {
        $this->code = $this->generateCode(User::class);

        return view('livewire.admin.user.create',[
            'code' => $this->code,
        ]);
    }
}
