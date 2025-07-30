<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Title('Create Category')]
class Create extends Component
{
    #[Validate('required|min:3|unique:categories,name')]
    public $name = '';

    #[Validate('nullable|min:3')]
    public $description = '';


    public function store()
    {
        $this->validate();

            Category::create([
                'name' => $this->name,
                'description' => $this->description,
            ]
        );

        toastr()->success('Criado com sucesso');

        return redirect()->route('category.index');

    }
}

