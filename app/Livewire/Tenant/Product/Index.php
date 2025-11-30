<?php

namespace App\Livewire\Admin\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

#[Title('Product')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Product::query()
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id): void
    {
        Product::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.product.index');
    }
}

