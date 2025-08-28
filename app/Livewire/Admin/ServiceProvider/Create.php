<?php

namespace App\Livewire\Admin\ServiceProvider;

use App\Models\ServiceProvider;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Service Provider')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public $code;
    public $name;
    public $birth_date;
    public $document;
    public $email;
    public $phone;
    public $service_type;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $account_bank;
    public $account_number;


    public function store()
    {
        $this->validate([
            'code' => 'required|unique:service_providers,code|min:3',
            'name' => 'required|min:3',
            'birth_date' => 'required|min:3',
            'email' => 'required|email|unique:service_providers,email',
            'phone' => 'required|min:5',
            'document' => 'nullable|min:5|unique:service_providers,document',
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zip' => 'required|min:3',
            'account_bank' => 'required|min:3',
            'account_number' => 'required|min:3',
        ]);

        ServiceProvider::create([
            'code' => $this->code,
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' =>$this->zip,
            'account_bank' => $this->account_bank,
            'account_number' => $this->account_number,
        ]);

        toastr()->success('Criado com sucesso!');
        return redirect()->route('provider.index');
    }

    public function render()
    {
        $this->code =  $this->generateCode(ServiceProvider::class);

        return view('livewire.admin.service-provider.create');
    }
}
