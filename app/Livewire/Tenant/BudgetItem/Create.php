<?php

namespace App\Livewire\Tenant\BudgetItem;

use App\Models\BudgetItem;
use App\Models\Product;
use App\Traits\Alert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Budget Items')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    use Alert;

    public $budget_id;
    public $products;

    public $product_id;
    public $price = 0;
    public $description = '';
    public $tax = 0;
    public $taxValue = 0;
    public $quantity = 0;
    public $total = 0;
    public $subtotal = 0;

    public function increment()
    {
        $this->quantity++;
        $this->calculateTotals();
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->calculateTotals();
        }
    }

    public function mount($budgetId)
    {
        $this->budget_id = $budgetId;
        $this->products = Product::all();
    }

    public function updatingProductId($value)
    {
        $product = Product::find($value);
        if ($product) {
            $this->quantity = 1;
            $this->price = $product->price;
            $this->description = $product->description;
            $this->calculateTotals();
        }
    }

    public function calculateTotals()
    {
        $this->subtotal = (float)$this->price * (float)$this->quantity;
        $this->taxValue = $this->subtotal * ((float)$this->tax / 100);
        $this->total = $this->subtotal + $this->taxValue;
    }

    public function updatedPrice() { $this->calculateTotals(); }
    public function updatedQuantity() { $this->calculateTotals(); }
    public function updatedTax() { $this->calculateTotals(); }

    public function resetForm()
    {
        $this->reset(['product_id','price','description','tax','quantity','subtotal','taxValue','total']);
    }

    public function insertItem()
    {
        $this->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'total' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'taxValue' => 'required|numeric',
            'description' => 'nullable|string|min:3|max:255',
        ]);

        BudgetItem::create([
            'budget_id' => $this->budget_id,
            'product_id' => $this->product_id,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => $this->tax,
            'tax_value' => $this->taxValue,
            'subtotal' => $this->subtotal,
            'total' => $this->total,
        ]);

        $this->closeForm();
        $this->dispatch('refreshList');
        $this->success();
    }

    public function closeForm()
    {
        $this->resetForm();
        $this->dispatch('close-modal', name: 'create-item');

    }

    public function render()
    {
        return view('livewire.tenant.budget-item.create');
    }
}
