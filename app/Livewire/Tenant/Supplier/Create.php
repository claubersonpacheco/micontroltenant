<?php

namespace App\Livewire\Admin\Supplier;

use App\Models\Supplier;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create product supplier')]
class Create extends Component
{
    use GenerateAutomaticCode;

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

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:suppliers,code|min:3',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'nullable|min:5',
            'document' => 'nullable|min:5|unique:s,document',
            'service_type' => 'nullable|min:3',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'state' => 'nullable|min:2',
            'zip' => 'nullable|min:3',
            'account_bank' => 'nullable|min:3',
            'account_number' => 'nullable|min:3',
            'client' => 'nullable|boolean',
            'code_client' => 'nullable|min:3',
        ]);

        Supplier::create([
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

        toastr()->success('Create with success!');
        return redirect()->route('supplier.index');
    }


    public function render()
    {
        $this->code =  $this->generateCode(Supplier::class);

        return view('livewire.admin.supplier.create');
    }
}
