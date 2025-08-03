<?php

namespace App\Livewire\Admin\Budget;

use App\Models\Budget;
use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Edit Budget')]
class Edit extends Component
{
    public $budget;

    public $code = '';
    public $name = '';
    public $description = '';


    public function mount($id)
    {
        $this->budget = Budget::findOrFail($id);

        $this->code = $this->budget->code;
        $this->name = $this->budget->name;
        $this->description = $this->budget->description;

    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'description' => 'nullable|min:3',
        ]);

        $this->budget->update([
            'code' => $this->code,
            'name' => $this->name,
            'description' => $this->description,

        ]);

        toastr()->success('Produto atualizado com sucesso!');
        return redirect()->route('budget.index');
    }

    public function render()
    {
        return view('livewire.admin.budget.edit', [
            'categories' => Budget::all(),
        ]);
    }
}
