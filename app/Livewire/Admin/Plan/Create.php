<?php

namespace App\Livewire\Admin\Plan;

use App\Models\Plan;
use App\Traits\Alert;
use App\Traits\GenerateAutomaticCode;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    use GenerateAutomaticCode;
    use Alert;
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
    public ?string $public_id = null;
    public $is_public = false;

    public function mount(): void
    {
        $this->code =  $this->generateCode(Plan::class);
        $this->public_id = (string) Str::uuid();
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value); // Converte o nome em slug
    }

    public function store()
    {
        $this->validate([
            'code' => 'required|min:3|unique:plans,code',
            'public_id' => 'required|min:5|unique:plans,public_id',
            'name' => 'required|min:3',
            'slug' => 'required|min:3|unique:plans,slug',
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

        Plan::create([
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
            'public_id' => $this->public_id,
            'is_public' => $this->is_public,
        ]);

        toastr()->success('Plano criado com sucesso!');
        return redirect()->route('admin.plan.index');
    }

    public function render()
    {
        return view('livewire.admin.plan.create');
    }
}
