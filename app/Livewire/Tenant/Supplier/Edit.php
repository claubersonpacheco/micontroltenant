<?php

namespace App\Livewire\Tenant\Supplier;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Edit Supplier')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    public $supplier;

    public $code;
    public $name;
    public $email;
    public $phone;
    public $document;
    public $service_type;

    public $address;
    public $city;
    public $state;
    public $zip;
    public $account_bank;
    public $account_number;
    public $client;
    public $code_client;

    public function mount($id):void
    {
        $this->supplier = Supplier::findOrFail($id);

        $this->code = $this->supplier->code;
        $this->name = $this->supplier->name;
        $this->document = $this->supplier->document;
        $this->email = $this->supplier->email;
        $this->phone = $this->supplier->phone;
        $this->service_type = $this->supplier->service_type;
        $this->address = $this->supplier->address;
        $this->city = $this->supplier->city;
        $this->state = $this->supplier->state;
        $this->zip = $this->supplier->zip;
        $this->account_bank = $this->supplier->account_bank;
        $this->account_number = $this->supplier->account_number;
        $this->client = $this->supplier->client;
        $this->code_client = $this->supplier->code_client;
    }

    public function update()
    {
        $this->validate([
            'code' => 'required|min:3|unique:suppliers,code,' . $this->supplier->id,
            'name' => 'required|min:3',
            'email' => 'required|email|unique:suppliers,email,' . $this->supplier->id,
            'phone' => 'required|min:5',
            'document' => 'nullable|min:5|unique:suppliers,document,' . $this->supplier->id,
            'service_type' => 'nullable|min:3',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:2',
            'zip' => 'required|min:3',
            'account_bank' => 'required|min:3',
            'account_number' => 'required|min:3',
            'client' => 'boolean',
            'code_client' => 'nullable|min:3',
        ]);

        $this->supplier->update([
            'code' => $this->code,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'service_type' => $this->service_type,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'account_bank' => $this->account_bank,
            'account_number' => $this->account_number,
            'client' => $this->client,
            'code_client' => $this->code_client,
        ]);

        toastr()->success('Updated with success!');

        return redirect()->route('supplier.index');
    }

    public function render()
    {
        return view('livewire.tenant.supplier.edit');
    }
}
