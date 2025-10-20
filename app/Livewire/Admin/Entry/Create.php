<?php

namespace App\Livewire\Admin\Entry;

use App\Models\Budget;
use App\Models\Category;
use App\Models\Entry;
use App\Models\Expense;
use App\Models\Supplier;
use App\Traits\GenerateAutomaticCode;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Create Entry')]
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

        if (!$this->budget) {
            return redirect()->route('admin.budgets.index');
        }

        $this->code =  $this->generateCode(Entry::class);

        $this->date = Carbon::now()->format('Y-m-d\TH:i');

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
            'category' => 'required',
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:30|unique:expenses,code',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'method' => 'required',
            'description' => 'nullable|string|max:255',
            'receipt' => 'required|in:0,1',
            'receipt_number' => 'nullable|string|max:15',
            'file_path' => 'nullable|file|mimes:pdf,jpg,png,jpeg|max:1024',
            'received_by' => 'required|string|max:50',
        ]);

        $filePath = null;

        if ($this->file_path) {
            try {
                $filePath = $this->uploadToBunny($this->file_path);
            } catch (\Exception $e) {
                toastr()->error($e->getMessage());
                return false;
            }
        }

        $res = Entry::create([
            'budget_id' => $this->budget->id,
            'category_id' => $this->category,
            'code' => $this->code,
            'name' => $this->name,
            'amount' => $this->amount,
            'date' => $this->date,
            'description' => $this->description,
            'method' => $this->method,
            'receipt' => $this->invoice,
            'receipt_number' => $this->receipt_number,
            'filename' => $this->fileName,
            'file_path' => $filePath,
            'received_by' => $this->received_by,

        ]);

        toastr()->success('Create with success!');

        $this->reset();

        return redirect()->route('entry.budget.listing', $res->budget_id );
    }

    protected function uploadToBunny($file)
    {
        $storageZone = env('BUNNY_STORAGE_ZONE');
        $AccessKey = env('BUNNY_API_KEY_PASSWORD');
        $urlPublic = env('BUNNY_URL_PUBLIC');

        $nameslug = Str::slug($this->name, '-');
        $formattedDate = Carbon::parse($this->date)->format('dmyHis');
        $this->fileName = $this->code.'-'.$formattedDate.'-'.Str::upper($nameslug).'.'.$file->getClientOriginalExtension();


        $path = "micontrol/receipt/{$this->fileName}";



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
            throw new \Exception('Failed to send to Bunny. Please check the error code: ' . $response->getStatusCode());
        }

        // Retorna a URL pública do arquivo
        return "{$urlPublic}/{$path}";
    }
    public function render()
    {
        return view('livewire.admin.entry.create');
    }
}
