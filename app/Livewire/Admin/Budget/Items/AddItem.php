<?php

namespace App\Livewire\Admin\Budget\Items;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\Product;
use Livewire\Component;

class AddItem extends Component
{

    public $budget_id;
    public $products;

    public $product_id;
    public $price = 0;
    public $description = '';
    public $tax = '0';
    public $taxValue = 0;
    public $quantity = 0;
    public $total = 0;
    public $subtotal = 0;

    public function mount($budgetId)
    {

       $this->budget_id = $budgetId;

        $this->products = Product::all(); // ou o nome correto do seu modelo

    }

    public function updatingProductId($value)
    {

        $product = Product::findOrFail($value);

        if ($product) {
            $this->quantity = "1";
            $this->price = $product->price;
            $this->description = $product->description;
            $this->calculateTotals();
        }

    }


    public function calculateTotals()
    {

        $price = (float) $this->price;
        $quantity = (float) $this->quantity;
        $tax = (float) $this->tax;

        $subtotal = $price * $quantity;
        $this->subtotal =  $subtotal;

        $calculoTax = $subtotal * ($tax / 100) ;
        $this->taxValue = $calculoTax;

        $this->total = $subtotal + $calculoTax;


    }

    public function increment()
    {
        $this->quantity++;

        $this->calculateTotals();

    }

    public function decrement()
    {
        $this->quantity--;

        $this->calculateTotals();
    }

    public function updatingTax($value)
    {
        $this->tax = $value;
        $this->calculateTotals();
    }

    public function updatingPrice($value)
    {
        $this->calculateTotals();
    }


    public function resetForm()
    {
        $this->reset([
            'product_id',
            'quantity',
            'description',
            'tax',
            'price',
            'subtotal',
            'taxValue',
            'total',
        ]);
    }

    public function insert()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'taxValue' => 'required|numeric',
        ]);


        BudgetItem::create([
            'product_id' => $this->product_id,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => $this->tax === null ? 0 : $this->tax,
            'total' => $this->total,
            'subtotal' => $this->subtotal,
            'tax_value' => $this->taxValue,
            'budget_id' => $this->budget_id,
        ]);

        $this->resetForm();

        $this->updateBudgetTotal();

        // Fecha o modal no front
        $this->dispatch('close-add-modal');
        $this->dispatch('listItems');

        toastr()->success('Adcionado com sucesso!');
    }

    public function updateBudgetTotal()
    {
        $budget = Budget::findOrFail($this->budget_id);

        if ($budget) {

            $budgetSubTotal = $budget->items()->sum('subtotal'); // Sumando los totales de los itens
            $budgetTotal = $budget->items()->sum('total');
            $budgetTax = $budgetTotal - $budgetSubTotal;

            $budget->update([
                'subtotal' => $budgetSubTotal,
                'total' => $budgetTotal,
                'tax_value' => $budgetTax,
            ]);
        }
    }

    public function render()
    {
        return view('livewire.admin.budget.items.add-item');
    }
}
