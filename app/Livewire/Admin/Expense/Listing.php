<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\BudgetTotal;
use App\Models\Expense;
use App\Models\Product;
use App\Services\BudgetTotalService;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Listing Expense')]
class Listing extends Component
{
    use WithPagination;

    public $budget;

    public ?BudgetTotal $totals = null;

    public $showCode;
    public $showName;
    public $showDescription;
    public $showAmount;
    public $showDate;
    public $showMethod;
    public $showInvoiceNumber;
    public $showFileName;
    public $showFilePath;

    public $showModal = false;
    public $itemIdToDelete;

    private $id;

    public ?int $quantity = 50;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    public function mount(int $id): void
    {
        $this->budget = Budget::with([
            'summary',
            'filters'
        ])->findOrFail($id);

        $this->totals = $this->budget->summary;

        $this->showCode = $this->budget->filters->show_ex_code;
        $this->showName = $this->budget->filters->show_ex_name;
        $this->showDescription = $this->budget->filters->show_ex_description;
        $this->showAmount = $this->budget->filters->show_ex_amount;
        $this->showDate = $this->budget->filters->show_ex_date;
        $this->showMethod = $this->budget->filters->show_ex_method;
        $this->showInvoiceNumber = $this->budget->filters->show_ex_invoice_number;
        $this->showFileName = $this->budget->filters->show_ex_filename;
        $this->showFilePath = $this->budget->filters->show_ex_file_path;

    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Expense::query()
            ->with('budget')
            ->where('budget_id', $this->budget->id)
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function openModal(int $id): void
    {
        $this->itemIdToDelete = $id;
        $this->showModal = true;
    }

    #[On('closeModal')]
    public function closeModal()
    {
        $this->showModal = false;
    }

    // filtros
    /** 🔁 Atualiza lista de itens */
    #[On('refreshList')]
    public function refreshList(): void
    {
        $this->resetPage();
        $this->budget->refresh();
    }

    /** 🔢 Contar colunas ativas */
    public function countFiltered(): int
    {
        return count(array_filter([
            $this->showCode,
            $this->showName,
            $this->showDescription,
            $this->showAmount,
            $this->showDate,
            $this->showMethod,
            $this->showInvoiceNumber,
            $this->showFileName,
            $this->showFilePath,
        ]));
    }

    /** 💾 Atualiza colunas de exibição no orçamento */
    public function atualizationColumns(): void
    {
        if (!$this->budget?->id) {
            return;
        }

        $this->budget->filters->update([
            'show_ex_code' => $this->showCode,
            'show_ex_name' => $this->showName,
            'show_ex_description' => $this->showDescription,
            'show_ex_amount' => $this->showAmount,
            'show_ex_date' => $this->showDate,
            'show_ex_method' => $this->showMethod,
            'show_ex_invoice_number' => $this->showInvoiceNumber,
            'show_ex_filename' => $this->showFileName,
            'show_ex_file_path' => $this->showFilePath,
        ]);

        $this->budget->refresh();
    }
    // end filtros

    public function render()
    {
        return view('livewire.admin.expense.listing');
    }
}
