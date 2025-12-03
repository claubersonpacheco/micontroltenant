<?php

namespace App\Livewire\Tenant\Product;

use App\Models\Supplier;
use App\Traits\GenerateAutomaticCode;
use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Create Product')]
#[Layout('layouts.tenant.admin')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public $categories = [];
    public $category_id;
    public $name;
    public $code;
    public $price;
    public $product_type;
    public $description;

    public function mount()
    {
        $this->code =  $this->generateCode(Product::class);
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
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'code' => 'required|string|max:50',
            'price' => 'required|numeric',
        ]);

        Product::create([
            'name' => $this->name,
            'category_id' => $this->category_id,
            'code' => $this->code,
            'price' => $this->price,
            'description' => $this->description,
            'product_type' => $this->product_type,
        ]);

        toastr()->success('Creado com sucesso!');

        $this->reset();

        return redirect()->route('tenant.product.index');
    }

    public function render()
    {
        return view('livewire.tenant.product.create');
    }
}
