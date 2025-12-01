<?php

namespace App\Livewire\Tenant\Product\Partial;

use Livewire\Component;
use App\Models\Category;

class CreateCategoryModal extends Component
{
    public $name = '';
    public $description = '';
    public $show = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
    ];

    protected $listeners = [
        'open-category-modal' => 'openModal',
    ];

    public function openModal()
    {
        $this->reset();
        $this->resetValidation();
        $this->show = true;
    }

    public function closeModal()
    {
        $this->reset(['name', 'description']);
        $this->resetValidation();
        $this->show = false;
    }

    public function save()
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('loadCategories');

        toastr()->success('Category creado com sucesso!');

        $this->reset();
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.admin.product.partial.create-category-modal');
    }
}
