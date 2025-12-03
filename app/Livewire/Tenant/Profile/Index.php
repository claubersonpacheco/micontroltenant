<?php

namespace App\Livewire\Tenant\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;

#[Title('Profile')]
#[Layout('layouts.tenant.admin')]
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

        unset($this->email);

        $this->user->name = $this->name;

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();

        toastr()->success('Usuário atualizado com sucesso!');

        return redirect()->route('tenant.profile.index');
    }

    public function render()
    {
        return view('livewire.tenant.profile.index');
    }
}
