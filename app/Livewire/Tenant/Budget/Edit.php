<?php

namespace App\Livewire\Tenant\Budget;

use App\Models\Budget;
use App\Models\Category;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Edit Budgets')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    public $budget;

    public $code;
    public $name;
    public $customer;
    public $description;
    public $date;
    public $expirate;
    public $total_expirate;


    public function mount($id)
    {
        $this->budget = Budget::with(['customer', 'summary'])->findOrFail($id);

        $this->code = $this->budget->code;
        $this->name = $this->budget->name;
        $this->customer = $this->budget->customer->name;
        $this->description = $this->budget->description;
        // Usar as datas do banco (se existirem)
        $this->date = $this->budget->date ? Carbon::parse($this->budget->date)->format('Y-m-d') : Carbon::now()->format('Y-m-d');
        $this->expirate = $this->budget->expirate ? Carbon::parse($this->budget->expirate)->format('Y-m-d') : Carbon::now()->addDays(30)->format('Y-m-d');

        // Calcula inicialmente os dias restantes
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

    // Atualiza quando mudar date ou expirate
    public function updatedDate()
    {
        $this->calculateTotalExpirate();
    }

    public function updatedExpirate()
    {
        $this->calculateTotalExpirate();
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
        ]);

        $this->budget->update([
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'date' => $this->date,
            'expirate' => $this->expirate,
            'total_expirate' => $this->total_expirate,

        ]);

        toastr()->success('Updated with success!');
        return redirect()->route('budget.index');
    }

    public function render()
    {
        return view('livewire.tenant.budget.edit', [
            'categories' => Budget::all(),
        ]);
    }
}
