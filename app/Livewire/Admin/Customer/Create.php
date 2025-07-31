<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Customer')]
class Create extends Component
{
    public $code = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $document = '';
    public $address = '';

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:customers,code|min:3',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|min:5',
            'document' => 'nullable|min:5|unique:customers,document',
            'address' => 'required|min:3',
        ]);

        Customer::create([
            'code' => $this->code,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'address' => $this->address,
        ]);

        toastr()->success('Cliente criado com sucesso!');
        return redirect()->route('customer.index');
    }

    public function render()
    {
        return view('livewire.admin.customer.create');
    }
}
