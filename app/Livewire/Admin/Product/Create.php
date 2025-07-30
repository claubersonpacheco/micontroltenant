<?php
namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Product')]
class Create extends Component
{
    public $code = '';
    public $name = '';
    public $description = '';
    public $product_type = '';
    public $price = '';
    public $category_id = '';

    public function store()
    {
        $this->validate([
            'code' => 'required|unique:products,code|min:3',
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
            'product_type' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'product_type' => $this->product_type,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        toastr()->success('Produto criado com sucesso!');
        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.admin.product.create', [
            'categories' => Category::all(),
        ]);
    }
}
