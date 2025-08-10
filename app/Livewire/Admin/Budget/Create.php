<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use App\Models\Customer;
use App\Traits\GenerateAutomaticCode;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Budget')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public $code = '';
    public $name = '';
    public $customer = '';
    public $description = '';

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:budgets,code|min:3',
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
            'customer' => 'required',
        ]);

        Budget::create([
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'customer_id' => $this->customer,
        ]);

        toastr()->success('Budget criado com sucesso!');
        return redirect()->route('budget.index');
    }

    public function render()
    {
        $this->code = $this->generateCode(Budget::class);

        return view('livewire.admin.budget.create',[
            'customers' => Customer::all(),
            'code'  => $this->code,
        ]);
    }
}
