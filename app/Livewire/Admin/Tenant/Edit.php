<?php

namespace App\Livewire\Admin\Tenant;

use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Edit tenant')]
#[Layout('layouts.admin.admin')]
class Edit extends Component
{
    public $tenantId;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;
    public $domain;

    public function mount($id)
    {
        $tenant = Tenant::findOrFail($id);

        $this->tenantId = $tenant->id;
        $this->name = $tenant->name;
        $this->email = $tenant->email;
        $this->domain = optional($tenant->domains->first())->domain;
    }

    public function update()
    {
        $tenant = Tenant::findOrFail($this->tenantId);

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('tenants')->ignore($tenant->id),
            ],
            'password' => 'nullable|min:6',
            'domain' => [
                'required',
                'string',
                Rule::unique('domains', 'domain')->ignore(optional($tenant->domains->first())->id),
            ],
        ]);

        $tenant->name = $this->name;
        $tenant->email = $this->email;

        if (!empty($this->password)) {
            $tenant->password = Hash::make($this->password);
        }

        $tenant->save();

        // Atualizar domínio (só existe um por padrão)
        if ($this->domain && $tenant->domains->isNotEmpty()) {
            $tenant->domains->first()->update(['domain' => $this->domain]);
        }

        $this->reset('password');

        toastr()->success('Tenant atualizado com sucesso!');
        return redirect()->route('tenant.index');
    }

    public function render()
    {
        return view('livewire.admin.tenant.edit');
    }
}
