<?php
namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Traits\GenerateAutomaticCode;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Create Service')]
class Create extends Component
{
    use GenerateAutomaticCode;

    public ?string $code = null;
    public ?string $name = null;
    public ?string $description = null;
    public ?string $product_type = null;
    public ?int $price = null;
    public ?int $category_id = null;

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
        $this->code = $this->generateCode(Product::class);

        return view('livewire.admin.product.create', [
            'categories' => Category::all(),
        ]);
    }
}
