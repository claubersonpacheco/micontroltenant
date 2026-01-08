<?php

namespace App\Livewire\Tenant\Product;

use App\Models\Product;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{

    use Alert;

    public Product $product;

    public bool $confirming = false;


    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    public function delete(): void
    {
        $this->product->delete();

        $this->dispatch('deleted');
        $this->success();

        $this->confirming = false;
    }

    public function render()
    {
        return view('livewire.tenant.product.delete');
    }
}
