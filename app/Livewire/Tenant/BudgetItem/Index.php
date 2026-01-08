<?php

namespace App\Livewire\Tenant\BudgetItem;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Services\BudgetTotalService;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public Budget $budget;
    public ?string $search = null;
    public int $quantity = 20;
    public string $colorStatus = '';
    public array $selectedItems = [];

    // Controle de colunas
    public bool $showService;
    public bool $showDescription;
    public bool $showQtd;
    public bool $showPrice;
    public bool $showTax;
    public bool $showTaxValue;
    public bool $showSubTotal;
    public bool $showTotal;

    public ?int $itemDelete = null;


    // Ordenação
    public array $sort = [
        'column'    => 'position',
        'direction' => 'asc',
    ];


    public function mount($budgetId): void
    {
        $this->budget = Budget::with([
            'summary',
            'latestStatus',
            'filters'
        ])->findOrFail($budgetId);


        // Inicializa colunas conforme orçamento
        $this->showService     = (bool) $this->budget->filters->show_bi_service;
        $this->showDescription = (bool) $this->budget->filters->show_bi_description;
        $this->showQtd         = (bool) $this->budget->filters->show_bi_qtd;
        $this->showPrice       = (bool) $this->budget->filters->show_bi_price;
        $this->showTax         = (bool) $this->budget->filters->show_bi_tax;
        $this->showTaxValue    = (bool) $this->budget->filters->show_bi_tax_value;
        $this->showSubTotal    = (bool) $this->budget->filters->show_bi_sub_total;
        $this->showTotal       = (bool) $this->budget->filters->show_bi_total;

        $this->colorStatus = $this->getStatusColor($this->budget->latestStatus->status ?? 'default');
    }

    /** 🔁 Computed property para listar itens */
    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return BudgetItem::query()
            ->where('budget_id', $this->budget->id)
            ->when($this->search, fn($q) =>
            $q->where('description', 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy($this->sort['column'], $this->sort['direction'])
            ->paginate($this->quantity)
            ->withQueryString();
    }

    /** 🔁 Atualiza lista de itens */
    #[On('refreshList')]
    public function refreshList(): void
    {
        $this->resetPage();
        $this->budget->refresh();
        $this->colorStatus = $this->getStatusColor($this->budget->latestStatus->status ?? 'default');
    }


    /** 🗑️ Deletar vários itens */
    public function deleteSelected(): void
    {
        if (empty($this->selectedItems)) {
            return;
        }

        BudgetItem::where('budget_id', $this->budget->id)
            ->whereIn('id', $this->selectedItems)
            ->delete();

        $this->selectedItems = [];
        BudgetTotalService::updateTotals($this->budget->id);
        $this->refreshList();
    }

    /** 🔁 Selecionar / desmarcar tudo */
    public function toggleSelectAll(): void
    {
        if (count($this->selectedItems) === $this->rows->count()) {
            $this->selectedItems = [];
        } else {
            $this->selectedItems = $this->rows->pluck('id')->toArray();
        }
    }

    /** 🔢 Contar colunas ativas */
    public function countFiltered(): int
    {
        return count(array_filter([
            $this->showService,
            $this->showDescription,
            $this->showQtd,
            $this->showPrice,
            $this->showTax,
            $this->showTaxValue,
            $this->showSubTotal,
            $this->showTotal,
        ]));
    }

    /** ↕️ Atualiza ordem dos itens */
    public function updateItemOrder(array $ids): void
    {
        foreach ($ids as $index => $id) {
            BudgetItem::where('id', $id)
                ->where('budget_id', $this->budget->id)
                ->update(['position' => $index + 1]);
        }

        $this->refreshList();
    }

    /** 💾 Atualiza colunas de exibição no orçamento */
    public function atualizationColumns(): void
    {
        if (!$this->budget?->id) {
            return;
        }

        $this->budget->filters->update([
            'show_bi_service'     => $this->showService,
            'show_bi_description' => $this->showDescription,
            'show_bi_price'       => $this->showPrice,
            'show_bi_qtd'         => $this->showQtd,
            'show_bi_tax'         => $this->showTax,
            'show_bi_tax_value'   => $this->showTaxValue,
            'show_bi_sub_total'   => $this->showSubTotal,
            'show_bi_total'       => $this->showTotal,
        ]);

        $this->budget->refresh();
    }

    /** 🎨 Define cor por status */
    private function getStatusColor(?string $status): string
    {
        return match ($status) {
            'status-open'       => 'bg-blue-100',
            'status-sent'       => 'bg-yellow-100',
            'status-pending'    => 'bg-orange-100',
            'status-rejected'   => 'bg-red-100',
            'status-approved'   => 'bg-green-100',
            'status-in-process' => 'bg-purple-100',
            'status-completed'  => 'bg-gray-200',
            default             => 'bg-neutral-100',
        };
    }

    public function render()
    {
        return view('livewire.tenant.budget-item.index', [
            'budget' => $this->budget,
            'rows'   => $this->rows,
        ]);
    }
}
