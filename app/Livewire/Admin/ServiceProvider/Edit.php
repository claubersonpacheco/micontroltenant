<?php

namespace App\Livewire\Admin\ServiceProvider;

use App\Models\ServiceProvider;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Service Provider')]
class Edit extends Component
{
    public $provider;

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

    public function mount($id)
    {
        $this->provider = ServiceProvider::findOrFail($id);

        $this->code = $this->provider->code;
        $this->name = $this->provider->name;
        $this->birth_date = $this->provider->birth_date;
        $this->document = $this->provider->document;
        $this->email = $this->provider->email;
        $this->phone = $this->provider->phone;
        $this->service_type = $this->provider->service_type;
        $this->address = $this->provider->address;
        $this->city = $this->provider->city;
        $this->state = $this->provider->state;
        $this->zip = $this->provider->zip;
        $this->account_bank = $this->provider->account_bank;
        $this->account_number = $this->provider->account_number;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'birth_date' => 'required|min:3',
            'email' => 'required|email|unique:service_providers,email,'. $this->provider->id,
            'phone' => 'required|min:5',
            'document' => 'nullable|min:5|unique:service_providers,document,'. $this->provider->id,
            'address' => 'required|min:3',
            'city' => 'required|min:3',
            'state' => 'required|min:3',
            'zip' => 'required|min:3',
            'account_bank' => 'required|min:3',
            'account_number' => 'required|min:3',
        ]);

        $this->provider->update([
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

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('provider.index');
    }

    public function render()
    {
        return view('livewire.admin.service-provider.edit');
    }
}
