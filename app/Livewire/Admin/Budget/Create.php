<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use App\Models\Customer;
use App\Traits\GenerateAutomaticCode;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Budget')]
class Create extends Component
{
    use GenerateAutomaticCode;

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

        // Criar objetos Carbon para calcular a diferença
        $start = Carbon::parse($this->date);
        $end = Carbon::parse($this->expirate);

        $this->total_expirate = $start->diffInDays($end);
    }

    public function updatedExpirate($value)
    {
        $this->calculateDays();
    }

    public function updatedDate($value)
    {
        $this->calculateDays();
    }

    public function calculateDays()
    {

        if ($this->date && $this->expirate) {
            $start = Carbon::parse($this->date);
            $end = Carbon::parse($this->expirate);

            $this->total_expirate = $start->diffInDays($end);
        } else {
            $this->total_expirate = 'nulo';
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

        return view('livewire.admin.budget.create',[
            'customers' => Customer::all(),
            'code'  => $this->code,
        ]);
    }
}
