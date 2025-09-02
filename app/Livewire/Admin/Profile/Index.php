<?php

namespace App\Livewire\Admin\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

#[Title('Profile')]
class Index extends Component
{
    public $user;
    public $name;
    public $email;
    public ?string $password = null;
    public ?string $password_confirmation = null;

    public function mount(): void
    {
        $this->user = Auth::user();

        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255'
            ],
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
        ];
    }

    public function save()
    {
        $this->validate();

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        toastr()->success('Usuário atualizado com sucesso!');

        return redirect()->route('profile.index');
    }

    public function render()
    {
        return view('livewire.admin.profile.index');
    }
}
