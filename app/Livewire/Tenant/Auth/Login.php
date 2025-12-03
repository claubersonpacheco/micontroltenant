<?php

namespace App\Livewire\Tenant\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
#[Layout('layouts.tenant.auth')]
class Login extends Component
{
    public string $email = '';
    public string $password = '';

    public function authenticate()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('tenant')->attempt($credentials)) {
            session()->regenerate();
            return redirect()->intended(route('tenant.dashboard'));
        }

        $this->addError('email', 'Credenciais inválidas.');
    }

    public function render()
    {
        return view('livewire.tenant.auth.login');
    }
}
