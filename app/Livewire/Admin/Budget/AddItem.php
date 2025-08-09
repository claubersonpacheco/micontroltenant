<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use App\Models\BudgetItem;
use App\Models\Product;
use Livewire\Component;

class AddItem extends Component
{

    public $budget_id;
    public $product_id;
    public $products;
    public $productSelected = null;
    public $price = 0;
    public $description = '';
    public $tax = '0';
    public $taxValue = 0;
    public $quantity = 0;
    public $total = 0;
    public $total_tax = 0;

    public function mount(Budget $budget)
    {

       $this->budget_id = $budget->id;
        $this->products = Product::all(); // ou o nome correto do seu modelo

    }

    public function updatingProductId($value)
    {

        $product = Product::find($value);

        if ($product) {
            $this->quantity = "1";
            $this->price = $product->price;
            $this->description = $product->description;
            $this->tax = $product->tax; // se o produto tiver taxa
            $this->calculateTotals();
        }

    }


    public function calculateTotals()
    {

        $price = (float) $this->price;
        $quantity = (float) $this->quantity;
        $tax = (float) $this->tax;

        $subtotal = $price * $quantity;
        $this->total =  $subtotal;

        $calculoTax = $subtotal * ($tax / 100) ;
        $this->taxValue = $calculoTax;
        $this->total_tax = $subtotal + $calculoTax;

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
            'total',
            'total_tax',
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
            'total_tax' => 'required|numeric',
        ]);

        BudgetItem::create([
            'product_id' => $this->product_id,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'tax' => ($this->tax ?? null)? '0' : $this->tax,
            'total' => $this->total,
            'total_tax' => $this->total_tax,
            'budget_id' => $this->budget_id,
        ]);

        $this->reset(['product_id', 'description', 'quantity', 'price', 'tax', 'total', 'total_tax']);

        toastr()->success('Criado com sucesso no moodle!');

        $this->dispatch('listItems');
        $this->dispatch('close-modal');

    }

    public function render()
    {
        $this->productSelected = $this->product_id;

        return view('livewire.admin.budget.add-item');
    }
}
