<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Supplier;
use App\Traits\GenerateAutomaticCode;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Create extends Component
{
    use GenerateAutomaticCode;
    use WithFileUploads;

    public $budgetId;

    public $suppliers = [];
    public $supplier;

    public $categories = [];
    public $category;

    public $name;
    public $code;
    public $description;
    public $amount;
    public $expense_date;
    public $method_pay;
    public $invoice;
    public $invoice_number;
    public $invoice_path;
    public $fileName;

    public function mount($id)
    {

        $this->budgetId = Budget::findOrFail($id);

        if (!$this->budgetId) {
            return redirect()->route('admin.budgets.index');
        }

        $this->code =  $this->generateCode(Expense::class);

        $this->expense_date = Carbon::now()->format('Y-m-d');

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
            'expense_date' => 'required|date',
            'description' => 'nullable|string|max:255',
            'invoice' => 'required|in:0,1',
            'invoice_number' => 'nullable|string|max:15',
            'invoice_path' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:1024',
        ]);

        $invoicePath = null;

        if ($this->invoice_path) {
            try {
                $invoicePath = $this->uploadInvoiceToBunny($this->invoice_path);
            } catch (\Exception $e) {
                toastr()->error($e->getMessage());
                return;
            }
        }

        $res = Expense::create([
            'budget_id' => $this->budgetId->id,
            'category_id' => $this->category,
            'supplier_id' => $this->supplier,
            'code' => $this->code,
            'name' => $this->name,
            'amount' => $this->amount,
            'expense_date' => $this->expense_date,
            'description' => $this->description,
            'method_pay' => $this->method_pay,
            'invoice' => $this->invoice,
            'invoice_path' => $invoicePath,
            'filename' => $this->fileName,

        ]);

        toastr()->success('Create with success!');

        $this->reset();

        return redirect()->route('expense.budget.listing', $res->budget_id );
    }

    protected function uploadInvoiceToBunny($file)
    {
        $storageZone = env('BUNNY_STORAGE_ZONE');
        $AccessKey = env('BUNNY_API_KEY_PASSWORD');
        $urlPublic = env('BUNNY_URL_PUBLIC');

        $nameslug = Str::slug($this->name, '-');
        $formattedDate = Carbon::parse($this->expense_date)->format('dmy');
        $this->fileName = $this->code.'-'.$formattedDate.'-'.Str::upper($nameslug).'.'.$this->invoice_path->getClientOriginalExtension();


        $path = "micontrol/invoices/{$this->fileName}";



        // Cria o cliente Guzzle
        $client = new Client([
            'base_uri' => "https://storage.bunnycdn.com/{$storageZone}/",
            'timeout' => 30,
        ]);

        // Faz o upload via HTTP PUT
        $response = $client->request('PUT', $path, [
            'headers' => [
                'AccessKey' => $AccessKey,
            ],
            'body' => fopen($file->getRealPath(), 'r'),
        ]);

        if ($response->getStatusCode() !== 201) {
            throw new \Exception('Falha ao enviar arquivo para Bunny! Código: ' . $response->getStatusCode());
        }

        // Retorna a URL pública do arquivo
        return "{$urlPublic}/{$path}";
    }

    public function render()
    {
        return view('livewire.admin.expense.create');
    }
}
