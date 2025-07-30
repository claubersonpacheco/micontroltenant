<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

#[Title('Create Setting')]
class Create extends Component
{
    public ?string $title = null;
    public ?string $email = null;
    public ?string $address = null;
    public ?string $city = null;
    public ?string $postal_code = null;
    public ?string $send_email = null;
    public ?string $whatsapp = null;
    public ?string $prefix = null;
    public ?string $document = null;

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('settings', 'email')],
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:255'],
            'send_email' => ['required', 'string', 'max:255'],
            'whatsapp' => ['required', 'string', 'max:255'],
            'prefix' => ['required', 'string', 'max:255'],
            'document' => ['required', 'string', 'max:255'],
        ];
    }

    public function store()
    {
        $validated = $this->validate();

        Setting::create($validated);

        toastr()->success('Criado com sucesso!');

        return redirect()->route('setting.index');
    }

    public function render()
    {
        return view('livewire.admin.setting.create');
    }
}

