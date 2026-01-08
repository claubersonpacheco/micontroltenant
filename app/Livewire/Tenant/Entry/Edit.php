<?php

namespace App\Livewire\Tenant\Entry;

use App\Models\Category;
use App\Models\Entry;
use App\Services\BunnyServices;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

#[Title('Edit Entry')]
#[Layout('layouts.tenant.admin')]
class Edit extends Component
{
    use WithFileUploads;

    public Entry $entry;
    public $categories = [];

    public $budget;
    public $category;
    public $code;
    public $name;
    public $date;
    public $amount;
    public $method;
    public $description;
    public $received_by;
    public $receipt;
    public $receipt_number;
    public $fileUrl = null;

    /** @var TemporaryUploadedFile|null */
    public $file_path = null;

    public $fileName;

    public function mount($id):void
    {
        $this->entry = Entry::with('budget')->findOrFail($id);

        $this->category       = $this->entry->category_id;
        $this->code           = $this->entry->code;
        $this->name           = $this->entry->name;
        $this->date           = Carbon::parse($this->entry->date)->format('Y-m-d');
        $this->amount         = $this->entry->amount;
        $this->method         = $this->entry->method;
        $this->description    = $this->entry->description;
        $this->received_by    = $this->entry->received_by;
        $this->receipt        = (int) $this->entry->receipt;
        $this->receipt_number = $this->entry->receipt_number;
        $this->fileName       = $this->entry->filename;
        $this->file_path      = $this->entry->file_path;


        if(!empty($this->file_path)){
            $this->fileUrl = BunnyServices::url($this->file_path);
        }else{
            $this->fileUrl = "";
        }

        $this->loadCategories();
    }

    #[On('loadCategories')]
    public function loadCategories():void
    {
        $this->categories = Category::all();
    }

    public function update()
    {
        // 🔹 Validação base
        $this->validate([
            'category'    => 'required',
            'name'        => 'required|string|min:3|max:50',
            'amount'      => 'required|numeric',
            'date'        => 'required|date',
            'method'      => 'required',
            'description' => 'nullable|string|max:255',
            'receipt'     => 'required|in:0,1',
            'received_by' => 'nullable|string|min:3|max:50',
        ]);


        $filePath = $this->entry->file_path;
        $fileName = $this->entry->filename;

        if ($this->receipt == 1) {


            $this->validate([
                'receipt_number' => 'nullable|string|min:3|max:15',
            ]);

            if (!empty($this->file_path)) {
                $this->validate([
                    'file_path' => 'file|mimes:pdf,jpg,png,jpeg|max:1024',
                ]);

                // 🔁 substitui o arquivo antigo
                $filePath = BunnyServices::update(
                    $this->entry->file_path,
                    $this->file_path,
                    'receipt'
                );

                $fileName = basename($filePath);
            }

        } else {

            if ($this->entry->file_path) {
                BunnyServices::delete($this->entry->file_path);
            }

            $filePath = null;
            $fileName = null;
            $this->receipt_number = null;
            $this->receipt = 0;
        }

        $this->entry->update([
            'category_id'    => $this->category,
            'name'           => $this->name,
            'amount'         => $this->amount,
            'date'           => $this->date,
            'description'    => $this->description,
            'method'         => $this->method,
            'receipt'        => $this->receipt,
            'receipt_number' => $this->receipt_number,
            'filename'       => $fileName,
            'file_path'      => $filePath,
            'received_by'    => $this->received_by,
        ]);

        toastr()->success(__('Edit with success!'));

        return redirect()->route(
            'tenant.entry.budget.listing',
            $this->entry->budget_id
        );
    }

    public function render()
    {
        return view('livewire.tenant.entry.edit');
    }
}
