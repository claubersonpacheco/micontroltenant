<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\{Auth};
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.admin.auth')]
class Login extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var bool */
    public $remember = false;

    protected $rules = [
        'email' => ['required', 'email'],
        'password' => ['required'],
    ];

    public function authenticate()
    {
        $this->validate();

        if (!Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('email', trans('auth.failed'));
            return;
        }

        session()->regenerate(); // recomendado

        return redirect()->intended(route('admin'));
    }


    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
