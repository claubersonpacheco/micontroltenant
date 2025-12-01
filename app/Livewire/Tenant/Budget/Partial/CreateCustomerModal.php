<?php

namespace App\Livewire\Tenant\Budget\Partial;

use App\Models\Category;
use App\Models\Customer;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;

class CreateCustomerModal extends Component
{
    use GenerateAutomaticCode;

    public $code;
    public $name;
    public $email;
    public $phone;
    public $document;
    public $address;

    public $show = false;

    protected $rules = [
        'code' => 'required|unique:customers,code|min:3',
        'name' => 'required|min:3',
        'email' => 'required|email|unique:customers,email',
        'phone' => 'required|min:5',
        'document' => 'nullable|min:5|unique:customers,document',
        'address' => 'required|min:3',
    ];

    protected $listeners = [
        'open-category-modal' => 'openModal',
    ];

    public function openModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->show = true;
        $this->code = $this->generateCode(Customer::class);
    }

    public function closeModal()
    {
        $this->reset([
            'code',
            'name',
            'email' ,
            'phone' ,
            'document' ,
            'address'
        ]);
        $this->resetValidation();
        $this->show = false;
    }

    public function save()
    {
        $this->validate();

        Customer::create([
            'code' => $this->code,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'address' => $this->address,
        ]);

        $this->dispatch('loadCustomers');

        toastr()->success('Cliente creado com sucesso!');

        $this->reset();
        $this->show = false;
    }
    public function render()
    {
        return view('livewire.tenant.budget.partial.create-customer-modal');
    }
}
