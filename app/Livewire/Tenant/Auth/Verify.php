<?php

namespace App\Livewire\Tenant\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verify extends Component
{
    public function resend()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            redirect(route('home'));
        }

        Auth::user()->sendEmailVerificationNotification();

        $this->dispatch('resent');

        session()->flash('resent');
    }

    public function render()
    {
        return view('livewire.tenant.auth.verify')->extends('layouts.tenant.auth');
    }
}
