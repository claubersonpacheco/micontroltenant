<?php

namespace App\Livewire\Tenant\Entry;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Entry;
use App\Services\BunnyServices;
use App\Traits\GenerateAutomaticCode;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

#[Title('Create Entry')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    use GenerateAutomaticCode;
    use WithFileUploads;

    public $budget;
    public $categories = [];
    public $category;
    public $code;
    public $name;
    public $description;
    public $amount;
    public $date;
    public $method;
    public $invoice;
    public $received_by;

    public $receipt;
    public $file_path;
    public $receipt_number;
    public $fileName;

    public function mount($id)
    {
        $this->budget = Budget::findOrFail($id);

        $this->code = $this->generateCode(Entry::class);
        $this->date = Carbon::now()->format('Y-m-d');

        $this->loadCategories();
    }

    #[On('loadCategories')]
    public function loadCategories()
    {
        $this->categories = Category::all();
    }

    public function store()
    {
        $this->validate([
            'category'        => 'required',
            'name'            => 'required|string|max:50',
            'code'            => 'required|string|max:30|unique:entries,code',
            'amount'          => 'required|numeric',
            'date'            => 'required|date',
            'method'          => 'required',
            'description'     => 'nullable|string|max:255',
            'receipt'         => 'required|in:0,1',
            'receipt_number'  => 'nullable|string|max:15',
            'file_path'       => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:1024',
            'received_by'     => 'nullable|string|max:50',
        ]);

        $storedPath = null;

        if ($this->file_path) {
            $storedPath = BunnyServices::upload(
                $this->file_path,
                'receipt'
            );

            $this->fileName = basename($storedPath);
        }

        $entry = Entry::create([
            'budget_id'      => $this->budget->id,
            'category_id'    => $this->category,
            'code'           => $this->code,
            'name'           => $this->name,
            'amount'         => $this->amount,
            'date'           => $this->date,
            'description'    => $this->description,
            'method'         => $this->method,
            'receipt'        => $this->receipt,
            'receipt_number' => $this->receipt_number,
            'filename'       => $this->fileName,
            'file_path'      => $storedPath,
            'received_by'    => $this->received_by,
        ]);

        toastr()->success('Create with success!');

        return redirect()->route(
            'tenant.entry.budget.listing',
            $entry->budget_id
        );
    }

    public function render()
    {
        return view('livewire.tenant.entry.create');
    }
}
