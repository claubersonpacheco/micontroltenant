<?php

namespace App\Livewire\Tenant\Supplier\Partials;

use App\Models\Supplier;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;

class CreateSupplierModal extends Component
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

    public $show = false;



    protected $listeners = [
        'open-supplier-modal' => 'openModal',
    ];

    public function openModal()
    {
        $this->reset();
        $this->resetValidation();

        $this->code = $this->generateCode(Supplier::class);

        $this->show = true;
    }

    public function closeModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->show = false;
    }

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:suppliers,code|min:3',
            'name' => 'required|min:3',
            'email' => 'required|email|unique:suppliers,email',
            'phone' => 'nullable|min:5',
            'document' => 'nullable|min:5|unique:suppliers,document',
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

        $this->dispatch('loadSuppliers');

        toastr()->success('Create with success!');

        $this->reset();
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.tenant.supplier.partials.create-supplier-modal');
    }
}
