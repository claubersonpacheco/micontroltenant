<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Traits\GenerateAutomaticCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Budget')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public $customers = [];

    public ?string $code = null;
    public ?string $name = null;
    public ?string $customer = null;
    public ?string $description = null;
    public $date;
    public $expirate;
    public $total_expirate;

    public function mount()
    {
        // Data atual no formato YYYY-MM-DD
        $this->date = Carbon::now()->format('Y-m-d');
        $this->expirate = Carbon::now()->addDays(30)->format('Y-m-d');

        $this->calculateTotalExpirate();

        $this->code =  $this->generateCode(Customer::class);
        $this->loadCustomers();
    }

    #[On('loadCustomers')]
    public function loadCustomers()
    {
        $this->customers = Customer::all();
    }


    public function updatedDate()
    {
        $this->calculateTotalExpirate();
    }

    public function updatedExpirate()
    {
        $this->calculateTotalExpirate();
    }

    public function calculateTotalExpirate()
    {
        if ($this->date && $this->expirate) {
            $start = Carbon::parse($this->date);
            $end = Carbon::parse($this->expirate);

            // Se a data de expiração for menor que a inicial, corrige
            if ($end->lessThanOrEqualTo($start)) {
                $end = $start->copy()->addDay();
                $this->expirate = $end->format('Y-m-d');
            }

            $this->total_expirate = $start->diffInDays($end);
        } else {
            $this->total_expirate = null;
        }
    }

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:budgets,code|min:3',
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
            'customer' => 'required',
            'date' => 'required|date',
            'expirate' => 'required|date|after_or_equal:date',
        ]);

        Budget::create([
            'code' => $this->code,
            'name' => $this->name,
            'date' => $this->date,
            'expirate' => $this->expirate,
            'total_expirate' => $this->total_expirate,
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

        return view('livewire.admin.budget.create');
    }
}
