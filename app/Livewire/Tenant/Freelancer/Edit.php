<?php

namespace App\Livewire\Tenant\Freelancer;

use App\Models\Freelancer;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Edit Freelancer')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    public $freelancer;

    public $code;
    public $name;
    public $birth_date;
    public $document;
    public $email;
    public $phone;
    public $role;
    public $status;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $account_bank;
    public $account_number;

    public function mount($id)
    {
        $this->freelancer = Freelancer::findOrFail($id);

        $this->code = $this->freelancer->code;
        $this->name = $this->freelancer->name;
        $this->birth_date = $this->freelancer->birth_date;
        $this->document = $this->freelancer->document;
        $this->email = $this->freelancer->email;
        $this->phone = $this->freelancer->phone;
        $this->role = $this->freelancer->role;
        $this->status = $this->freelancer->status;
        $this->address = $this->freelancer->address;
        $this->city = $this->freelancer->city;
        $this->state = $this->freelancer->state;
        $this->zip = $this->freelancer->zip;
        $this->account_bank = $this->freelancer->account_bank;
        $this->account_number = $this->freelancer->account_number;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'birth_date' => 'required|min:3',
            'email' => 'nullable|email|unique:freelancers,email,' . $this->freelancer->id,
            'phone' => 'nullable|min:5',
            'document' => 'nullable|min:5|unique:freelancers,document,' . $this->freelancer->id,
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'state' => 'nullable|min:3',
            'zip' => 'nullable|min:3',
            'account_bank' => 'nullable|min:3',
            'account_number' => 'nullable|min:3',
            'role' => 'nullable|min:3',
            'status' => 'nullable',
        ]);

        $this->freelancer->update([
            'name' => $this->name,
            'birth_date' => $this->birth_date,
            'email' => $this->email,
            'phone' => $this->phone,
            'document' => $this->document,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'account_bank' => $this->account_bank,
            'account_number' => $this->account_number,
            'role' => $this->role,
            'status' => $this->status,
        ]);

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('tenant.freelancer.index');
    }

    public function render()
    {
        return view('livewire.tenant.freelancer.edit');
    }
}
