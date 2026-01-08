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
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Livewire\Attributes\Layout;

#[Title('Edit Expense')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    use GenerateAutomaticCode;
    use WithFileUploads;

    public $expense;
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

    public $fileUrl = null;

    /** @var TemporaryUploadedFile|null */
    public $file_path = null;
    public $fileName;

    public function mount($id)
    {
        $this->expense = Expense::with('budget')->findOrFail($id);

        $this->category = $this->expense->category_id;
        $this->supplier = $this->expense->supplier_id;
        $this->name = $this->expense->name;
        $this->code = $this->expense->code;
        $this->description = $this->expense->description;
        $this->amount = $this->expense->amount;
        $this->date = Carbon::parse($this->expense->date)->format('Y-m-d');
        $this->method = $this->expense->method;
        $this->invoice = $this->expense->invoice;
        $this->invoice_number = $this->expense->invoice_number;
        $this->fileName = $this->expense->filename;

        if(!empty($this->file_path)){
            $this->fileUrl = BunnyServices::url($this->file_path);
        }else{
            $this->fileUrl = "";
        }

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

    public function update()
    {
        $this->validate([
            'category' => 'required',
            'supplier' => 'required',
            'name' => 'required|string|min:3|max:50',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'method' => 'required',
            'description' => 'nullable|string|min:3|max:255',
            'invoice' => 'required|in:0,1',
        ]);

        $filePath = $this->expense->file_path;
        $fileName = $this->expense->filename;

        if ($this->invoice == 1) {

            $this->validate([
                'invoice_number' => 'nullable|string|min:3|max:15',
            ]);

            if (!empty($this->file_path)) {
                $this->validate([
                    'file_path' => 'file|mimes:pdf,jpg,png,jpeg|max:1024',
                ]);

                // 🔁 substitui o arquivo antigo
                $filePath = BunnyServices::update(
                    $this->expense->file_path,
                    $this->file_path,
                    'invoice'
                );

                $fileName = basename($filePath);
            }

        } else {

            if ($this->expense->file_path) {
                BunnyServices::delete($this->expense->file_path);
            }

            $filePath = null;
            $fileName = null;
            $this->invoice_number = null;
            $this->invoice = 0;
        }

        $this->expense->update([
            'category_id' => $this->category,
            'supplier_id' => $this->supplier,
            'name' => $this->name,
            'amount' => $this->amount,
            'date' => $this->date,
            'description' => $this->description,
            'method' => $this->method,
            'invoice' => $this->invoice,
            'invoice_number' => $this->invoice_number,
            'file_path' => $filePath,
            'filename' => $fileName,
        ]);

        toastr()->success('Edit with success!');

        return redirect()->route('tenant.expense.budget.listing', $this->expense->budget_id);
    }
    public function render()
    {
        return view('livewire.tenant.expense.edit');
    }
}
