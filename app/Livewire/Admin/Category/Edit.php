<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Edit Category')]
class Edit extends Component
{

    public Category $category;

    public $name = '';

    public $description = '';

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);
        $this->name = $this->category->name;
        $this->description = $this->category->description;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3|unique:categories,name,' . $this->category->id,
            'description' => 'nullable|min:3',
        ]);

        $this->category->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        toastr()->success('Atualizado com sucesso');

        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
    }
}

