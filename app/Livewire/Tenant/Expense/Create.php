<?php

namespace App\Livewire\Tenant\Expense;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Supplier;
use App\Services\BunnyServices;
use App\Traits\GenerateAutomaticCode;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Title('Create Expense')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    use GenerateAutomaticCode;
    use WithFileUploads;

    public $budget;

    public $suppliers = [];
    public $supplier;

    public $categories = [];
    public $category;

    public $name;
    public $code;
    public $description;
    public $amount;
    public $date;
    public $method;
    public $invoice;
    public $invoice_number;
    public $file_path;
    public $fileName;

    public function mount($id)
    {

        $this->budget = Budget::findOrFail($id);

        if (!$this->budget) {
            return redirect()->route('tenant.budgets.index');
        }

        $this->code =  $this->generateCode(Expense::class);

        $this->date = Carbon::now()->format('Y-m-d');

        $this->loadCategories();
        $this->loadSuppliers();
    }

    #[On('loadCategories')]
    public function loadCategories()
    {
        $this->categories = Category::all();
    }
    #[On('loadSuppliers')]
    public function loadSuppliers()
    {
        $this->suppliers = Supplier::all();
    }

    public function store()
    {
        $this->validate([
            'category' => 'required',
            'supplier' => 'required',
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:30|unique:expenses,code',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'method' => 'required',
            'description' => 'nullable|string|max:255',
            'invoice' => 'required|in:0,1',
            'invoice_number' => 'nullable|string|max:15',
            'file_path' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:1024',
        ]);

        $storedPath = null;

        if ($this->file_path) {
            $storedPath = BunnyServices::upload(
                $this->file_path,
                'expense'
            );

            $this->fileName = basename($storedPath);
        }

        $res = Expense::create([
            'budget_id' => $this->budget->id,
            'category_id' => $this->category,
            'supplier_id' => $this->supplier,
            'code' => $this->code,
            'name' => $this->name,
            'amount' => $this->amount,
            'date' => $this->date,
            'description' => $this->description,
            'method' => $this->method,
            'invoice' => $this->invoice,
            'invoice_number' => $this->invoice_number,
            'file_path' => $storedPath,
            'filename' => $this->fileName,

        ]);

        toastr()->success('Create with success!');

        return redirect()->route('tenant.expense.budget.listing', $res->budget_id );
    }

    public function render()
    {
        return view('livewire.tenant.expense.create');
    }
}
