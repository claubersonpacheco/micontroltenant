<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    public $setting;

    public $logo, $logo_impress, $favicon;

    public $showLogoModal = false;
    public $showLogoImpressModal = false;
    public $showFaviconModal = false;

    public function mount($id): void
    {
        $this->setting = Setting::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.setting.image');
    }

    public function uploadLogo()
    {
        $this->validate([
            'logo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if ($this->setting->logo) {
            Storage::disk('public')->delete($this->setting->logo);
        }

        $logoPath = $this->logo->store('images/logo', 'public');

        $this->setting->update([
            'logo' => $logoPath,
        ]);

        $this->reset('logo', 'showLogoModal');
    }

    public function uploadLogoImpress()
    {
        $this->validate([
            'logo_impress' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if ($this->setting->logo_impress) {
            Storage::disk('public')->delete($this->setting->logo_impress);
        }

        $path = $this->logo_impress->store('images/logo', 'public');

        $this->setting->update([
            'logo_impress' => $path,
        ]);

        $this->reset('logo_impress', 'showLogoImpressModal');
    }

    public function uploadFavicon()
    {
        $this->validate([
            'favicon' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
        ]);

        if ($this->setting->favicon) {
            Storage::disk('public')->delete($this->setting->favicon);
        }

        $path = $this->favicon->store('images/logo', 'public');

        $this->setting->update([
            'favicon' => $path,
        ]);

        $this->reset('favicon', 'showFaviconModal');
    }

    public function resetUploads()
    {
        $this->reset('logo', 'logo_impress', 'favicon');
    }

    public function deleteImage($type)
    {
        if (! in_array($type, ['logo', 'logo_impress', 'favicon'])) return;

        if ($this->setting->{$type}) {
            Storage::disk('public')->delete($this->setting->{$type});
            $this->setting->update([$type => null]);
        }
    }
}
