<?php

namespace App\Livewire\Admin\Email;


use App\Models\Email;
use Livewire\Component;

class View extends Component
{

    public $email;

    public function mount($id)
    {
        $this->email = Email::findOrFail($id);


    }
    public function render()
    {
        return view('livewire.admin.email.view');
    }
}
