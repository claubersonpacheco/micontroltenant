<?php

namespace App\Livewire\Admin\Plan;

use App\Models\Plan;
use Livewire\Component;

class Edit extends Component
{
    public $plan;

    // Campos do plano
    public $code = '';
    public $name = '';
    public $slug = '';
    public $description = '';
    public $price = 0;
    public $currency = 'EUR';
    public $billing_period = 'monthly';
    public $trial_days = 0;

    public $max_users;
    public $max_projects;
    public $max_storage_mb;
    public $features;

    public $highlighted = false;
    public $is_active = true;
    public $order = 0;
    public $tax_percentage = 0;
    public $public_id;
    public $is_public = false;

    public function mount($id)
    {
        $this->plan = Plan::findOrFail($id);

        // Preenche propriedades com os valores do banco
        $this->code = $this->plan->code;
        $this->name = $this->plan->name;
        $this->slug = $this->plan->slug;
        $this->description = $this->plan->description;
        $this->price = $this->plan->price;
        $this->currency = $this->plan->currency;
        $this->billing_period = $this->plan->billing_period;
        $this->trial_days = $this->plan->trial_days;

        $this->max_users = $this->plan->max_users;
        $this->max_projects = $this->plan->max_projects;
        $this->max_storage_mb = $this->plan->max_storage_mb;
        $this->features = is_array($this->plan->features)
            ? json_encode($this->plan->features, JSON_PRETTY_PRINT)
            : $this->plan->features;

        $this->highlighted = $this->plan->highlighted;
        $this->is_active = $this->plan->is_active;
        $this->order = $this->plan->order;
        $this->tax_percentage = $this->plan->tax_percentage;
        $this->public_id = $this->plan->public_id;
        $this->is_public = $this->plan->is_public;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'slug' => 'required|min:3|unique:plans,slug,' . $this->plan->id,
            'description' => 'nullable|min:3',
            'price' => 'required|numeric|min:0',
            'currency' => 'required|string|max:10',
            'billing_period' => 'required|in:monthly,yearly,lifetime',
            'trial_days' => 'integer|min:0',
            'max_users' => 'nullable|integer|min:0',
            'max_projects' => 'nullable|integer|min:0',
            'max_storage_mb' => 'nullable|integer|min:0',
            'features' => 'nullable',
            'highlighted' => 'boolean',
            'is_active' => 'boolean',
            'order' => 'integer|min:0',
            'tax_percentage' => 'numeric|min:0',
            'is_public' => 'boolean',
        ]);

        // Converte features JSON string → array (se for válido)
        $features = null;
        if (!empty($this->features)) {
            $decoded = json_decode($this->features, true);
            $features = json_last_error() === JSON_ERROR_NONE ? $decoded : $this->features;
        }

        $this->plan->update([
            'code' => $this->code,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'currency' => $this->currency,
            'billing_period' => $this->billing_period,
            'trial_days' => $this->trial_days,
            'max_users' => $this->max_users,
            'max_projects' => $this->max_projects,
            'max_storage_mb' => $this->max_storage_mb,
            'features' => $features,
            'highlighted' => $this->highlighted,
            'is_active' => $this->is_active,
            'order' => $this->order,
            'tax_percentage' => $this->tax_percentage,
            'is_public' => $this->is_public,
        ]);

        toastr()->success('Plano atualizado com sucesso!');
        return redirect()->route('admin.plan.index');
    }

    public function render()
    {
        return view('livewire.admin.plan.edit');
    }
}
