<?php

namespace App\Livewire\Admin\Budget\Items;

use App\Models\Budget;
use App\Models\BudgetItem;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Budget Items')]
class ItemsList extends Component
{
    use WithPagination;

    public $budget;

    public int $quantity = 20;

    public ?string $search = null;

    public bool $showService = false;
    public bool $showDescription = false;
    public bool $showQtd = false;
    public bool $showPrice = false;
    public bool $showTax = false;
    public bool $showTaxValue = false;
    public bool $showSubTotal = false;
    public bool $showTotal = false;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];


    public function mount($id): void
    {

        $this->budget = Budget::findOrFail($id);

        if (!$this->budget) {
            abort(404);
        }

        $this->showService    = (bool) $this->budget->show_service;
        $this->showDescription= (bool) $this->budget->show_description;
        $this->showQtd        = (bool) $this->budget->show_qtd;
        $this->showPrice      = (bool) $this->budget->show_price;
        $this->showTaxValue   = (bool) $this->budget->tax_value;
        $this->showTax        = (bool) $this->budget->tax;
        $this->showSubTotal   = (bool) $this->budget->show_sub_total;
        $this->showTotal      = (bool) $this->budget->show_total;
    }

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return BudgetItem::query()
            ->where('budget_id', $this->budget->id)
            ->when($this->search, fn ($query) =>
            $query->whereAny(['description'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }



    #[On('listItems')]
    public function refreshList()
    {
        $this->resetPage(); // volta para página 1, evita bug de paginação
    }

    public function deleteItem(int $idItem): void
    {
        BudgetItem::findOrFail($idItem)->delete();

        $this->dispatch('listItems');

        $this->updateBudgetTotal();
    }

    public function updateBudgetTotal()
    {
        $budget = Budget::findOrFail($this->budget);

        if ($budget) {

            $budgetSubTotal = $budget->items()->sum('subtotal'); // Sumando los totales de los itens
            $budgetTotal = $budget->items()->sum('total');
            $budgetTax = $budgetSubTotal - $budgetTotal;

            $budget->update([
                'subtotal' => $budgetTotal,
                'total' => $budgetTotal,
                'tax_value' => $budgetTax,
            ]);
        }
    }

    public function atualizationColumns(): void
    {
        if (!$this->budget?->id) {
            return;
        }

        $this->budget->update([
            'show_service'    => $this->showService,
            'show_description'=> $this->showDescription,
            'show_price'      => $this->showPrice,
            'show_qtd'        => $this->showQtd,
            'show_tax'        => $this->showTax,
            'show_tax_value'  => $this->showTaxValue,
            'show_sub_total'  => $this->showSubTotal,
            'show_total'      => $this->showTotal,
        ]);
    }



    public function updated($property): void
    {
        $campos = [
            'showService',
            'showDescription',
            'showPrice',
            'showQtd',
            'showTax',
            'showTaxValue',
            'showSubTotal',
            'showTotal'
        ];

        if (in_array($property, $campos, true)) {
            $this->atualizationColumns();
        }
    }
    public function render()
    {
        return view('livewire.admin.budget.items.items-list', [
            'budget' => $this->budget,
            'rows'   => $this->rows,
        ]);
    }
}

