<?php

namespace App\Livewire\Admin\Customer;

use App\Models\Customer;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Customer')]
class Edit extends Component
{
    public $customer;

    public $code = '';
    public $name = '';
    public $email = '';
    public $phone = '';
    public $document = '';
    public $address = '';

    public function mount($id)
    {
        $this->customer = Customer::findOrFail($id);

        $this->code = $this->customer->code;
        $this->name = $this->customer->name;
        $this->email = $this->customer->email;
        $this->phone = $this->customer->phone;
        $this->document = $this->customer->document;
        $this->address = $this->customer->address;
    }

    public function update()
    {
        $this->validate([
            'code' => 'required|min:3|unique:customers,code,' . $this->customer->id,
            'name' => 'required|min:3',
            'email' => 'required|email|unique:customers,email,' . $this->customer->id,
            'phone' => 'required|min:7',
            'document' => 'nullable|unique:customers,document,' . $this->customer->id,
            'address' => 'required|min:3',
        ]);

        $this->customer->update([
            'code' => $this->code,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'address' => $this->address,
        ]);

        toastr()->success('Cliente atualizado com sucesso!');
        return redirect()->route('customer.index');
    }

    public function render()
    {
        return view('livewire.admin.customer.edit');
    }
}
