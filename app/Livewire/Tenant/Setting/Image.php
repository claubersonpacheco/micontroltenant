<?php

namespace App\Livewire\Tenant\Setting;

use App\Models\Setting;
use App\Services\BunnyServices;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    public Setting $setting;

    public $logo;
    public $logo_impress;
    public $favicon;

    public bool $showLogoModal = false;
    public bool $showLogoImpressModal = false;
    public bool $showFaviconModal = false;

    public function mount($id): void
    {
        $this->setting = Setting::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.tenant.setting.image');
    }

    /* =========================
     * LOGO
     * ========================= */
    public function uploadLogo(): void
    {
        $this->validate([
            'logo' => 'required|image|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        // Apaga antigo se existir
        if ($this->setting->logo) {
            BunnyServices::delete($this->setting->logo);
        }

        $path = BunnyServices::upload(
            $this->logo,
            'images/logo'
        );

        $this->setting->update([
            'logo' => $path,
        ]);

        $this->reset('logo', 'showLogoModal');
    }

    /* =========================
     * LOGO IMPRESSÃO
     * ========================= */
    public function uploadLogoImpress(): void
    {
        $this->validate([
            'logo_impress' => 'required|image|max:2048|mimes:jpg,jpeg,png,webp',
        ]);

        if ($this->setting->logo_impress) {
            BunnyServices::delete($this->setting->logo_impress);
        }

        $path = BunnyServices::upload(
            $this->logo_impress,
            'images/logo'
        );

        $this->setting->update([
            'logo_impress' => $path,
        ]);

        $this->reset('logo_impress', 'showLogoImpressModal');
    }

    /* =========================
     * FAVICON
     * ========================= */
    public function uploadFavicon(): void
    {
        $this->validate([
            'favicon' => 'required|image|max:1024|mimes:png,ico,webp',
        ]);

        if ($this->setting->favicon) {
            BunnyServices::delete($this->setting->favicon);
        }

        $path = BunnyServices::upload(
            $this->favicon,
            'images/logo'
        );

        $this->setting->update([
            'favicon' => $path,
        ]);

        $this->reset('favicon', 'showFaviconModal');
    }

    /* =========================
     * DELETE
     * ========================= */
    public function deleteImage(string $type): void
    {
        if (!in_array($type, ['logo', 'logo_impress', 'favicon'])) {
            return;
        }
        dd($type);

        if ($this->setting->{$type}) {
            BunnyServices::delete($this->setting->{$type});
            $this->setting->update([$type => null]);
        }
    }

    public function resetUploads(): void
    {
        $this->reset('logo', 'logo_impress', 'favicon');
    }
}
