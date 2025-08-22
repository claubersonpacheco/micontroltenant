<?php

namespace App\Livewire\Admin\Tenant;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Title('Create tenant')]
#[Layout('layouts.admin.admin')]
class Create extends Component
{

    public $name;
    public $email;
    public $password;
    public $subdomain;
    public $tenants = [];


    public function mount()
    {
        $this->tenants = Tenant::all();
    }


    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:tenants,email',
            'password' => 'required|min:6',
            'subdomain' => 'required|string|unique:domains,domain',
        ]);

        // Cria tenant no banco central (sem criar usuário aqui)
        $tenant = Tenant::create([
            'id' => (string) Str::uuid(),
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // ou remova esse campo se não for usado no central
            'data' => [],
        ]);

        $subdomainComplete =  $this->subdomain.'.'.env('CENTRAL_DOMAIN');
        // Cria domínio do tenant
        $tenant->domains()->create([
            'domain' => $subdomainComplete,
        ]);

        // Troca para o banco do tenant
        tenancy()->initialize($tenant);

        // Cria o usuário administrador no banco do tenant
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password), // este hash será único, mas correto
        ]);

        // Volta ao contexto do banco central
        tenancy()->end();

        $this->reset(['name', 'email', 'password', 'subdomain']);
        $this->tenants = Tenant::all();

        toastr()->success('Criado com sucesso!');
        return redirect()->route('tenant.index');
    }

    public function render()
    {
        return view('livewire.admin.tenant.create');
    }
}
