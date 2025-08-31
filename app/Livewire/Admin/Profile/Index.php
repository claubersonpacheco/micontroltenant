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

    public $userId;

    public ?string $password = null;

    public ?string $password_confirmation = null;

    public function mount(): void
    {
        $this->user = Auth::user();

    }

    public function rules(): array
    {
        return [
            'user.name' => [
                'required',
                'string',
                'max:255'
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

        $this->user->password = when($this->password !== null, Hash::make($this->password), $this->user->password);
        $this->user->save();

        toastr()->success('Usuário atualizado com sucesso!');

        return redirect()->route('profile.index');
    }

    public function render()
    {
        return view('livewire.admin.profile.index');
    }
}
