<?php

namespace App\Livewire\Admin\Budget\Items;

use App\Models\BudgetItem;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class EditItem extends Component
{

    public $budget_id;
    public $product;

    public int|string|null $product_id = null;

    public $itemId;

    public $products;
    public $price;
    public $description;
    public $tax;
    public $taxValue;
    public $quantity;
    public $total;
    public $subtotal;

    public function mount()
    {
        // carga los productos
        $this->products = Product::all();
    }

    #[On('edit-item')]
    public function loadItem($id)
    {

        $resItem = BudgetItem::findOrFail($id);

        $this->itemId = $resItem->id;
        $this->budget_id = $resItem->budget_id;

        if ($resItem) {
            $this->itemId = $resItem->id;
            $this->description = $resItem->description;
            $this->price = $resItem->price;
            $this->tax = $resItem->tax;
            $this->taxValue = $resItem->tax_value;
            $this->quantity = $resItem->quantity;
            $this->total = $resItem->total;
            $this->subtotal = $resItem->subtotal;
            $this->product_id = $resItem->product_id;
        }
    }


    public function updatedProductId($value)
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

    public function updateItem()
    {
        $this->validate([
            'product_id' => 'required|numeric',
            'quantity' => 'required|numeric|min:1',
            'price' => 'required|numeric',
            'tax' => 'nullable|numeric',
            'description' => 'nullable|string',
            'total' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'taxValue' => 'required|numeric',
        ]);


        // Busca o item pelo ID
        $item = BudgetItem::findOrFail($this->itemId);

        $item->update([
            'product_id' => $this->product_id,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => $this->tax ?? 0,
            'total' => $this->total,
            'tax_value' => $this->taxValue ?? 0,
            'subtotal' => $this->subtotal,
            'budget_id' => $this->budget_id,
        ]);

        $this->resetForm();

        $this->dispatch('close-modal', name: 'edit-item');
        $this->dispatch('listItems');
        toastr()->success('Edit with success!');

    }

    public function render()
    {
        return view('livewire.admin.budget.items.edit-item');
    }
}
