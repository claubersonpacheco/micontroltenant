<?php

namespace App\Livewire\Tenant\Freelancer;

use App\Models\Freelancer;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Create Freelancer')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public $code;
    public $name;
    public $birth_date;
    public $document;
    public $email;
    public $phone;
    public $role;
    public $address;
    public $city;
    public $state;
    public $zip;
    public $account_bank;
    public $account_number;
    public $status = true;


    public function store()
    {
        $this->validate([
            'code' => 'required|unique:freelancers,code|min:3',
            'name' => 'required|min:3',
            'birth_date' => 'nullable|required|min:3',
            'email' => 'nullable|email|unique:freelancers,email',
            'phone' => 'nullable|min:5',
            'document' => 'nullable|min:5|unique:freelancers,document',
            'address' => 'nullable|min:3',
            'city' => 'nullable|min:3',
            'state' => 'nullable',
            'zip' => 'nullable|min:3',
            'account_bank' => 'nullable|min:3',
            'account_number' => 'nullable|min:3',
            'role' => 'nullable|min:3',
        ]);

        Freelancer::create([
            'code' => $this->code,
            'name' => $this->name,
            'role' => $this->role,
            'status' => $this->status,
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
        return redirect()->route('tenant.freelancer.index');
    }

    public function render()
    {
        $this->code =  $this->generateCode(Freelancer::class);

        return view('livewire.tenant.freelancer.create');
    }
}
