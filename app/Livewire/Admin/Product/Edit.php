<?php

namespace App\Livewire\Admin\Product;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Product')]
class Edit extends Component
{
    public $product;

    public $code = '';
    public $name = '';
    public $description = '';
    public $product_type = '';
    public $price = '';
    public $category_id = '';

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);

        $this->code = $this->product->code;
        $this->name = $this->product->name;
        $this->description = $this->product->description;
        $this->product_type = $this->product->product_type;
        $this->price = $this->product->price;
        $this->category_id = $this->product->category_id;
    }

    public function update()
    {
        $this->validate([
            'code' => 'required|min:3|unique:products,code,' . $this->product->id,
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
            'product_type' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);

        $this->product->update([
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,
            'product_type' => $this->product_type,
            'price' => $this->price,
            'category_id' => $this->category_id,
        ]);

        toastr()->success('Produto atualizado com sucesso!');
        return redirect()->route('product.index');
    }

    public function render()
    {
        return view('livewire.admin.product.edit', [
            'categories' => Category::all(),
        ]);
    }
}
