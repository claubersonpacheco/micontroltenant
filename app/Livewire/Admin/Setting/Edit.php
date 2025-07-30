<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public Setting $setting;  // Declare a propriedade para o model
    public array $settings = []; // Array para os campos editáveis

    public function mount($id): void
    {
        $this->setting = Setting::findOrFail($id);
        $this->settings = $this->setting->toArray();
    }

    public function rules(): array
    {
        return [
            'settings.title' => ['required', 'string', 'max:255'],
            'settings.email' => ['required', 'email', Rule::unique('settings', 'email')->ignore($this->setting->id)],
            'settings.address' => ['required', 'string', 'max:255'],
            'settings.city' => ['required', 'string', 'max:255'],
            'settings.postal_code' => ['required', 'string', 'max:255'],
            'settings.send_email' => ['required', 'string', 'max:255'],
            'settings.whatsapp' => ['required', 'string', 'max:255'],
            'settings.prefix' => ['required', 'string', 'max:255'],
            'settings.document' => ['required', 'string', 'max:255'],
        ];
    }

    public function update()
    {
        $this->validate();

        $this->setting->update($this->settings);

        toastr()->success('Atualizado com sucesso!');

        return redirect()->route('setting.index');
    }

    public function render()
    {
        return view('livewire.admin.setting.edit');
    }
}

