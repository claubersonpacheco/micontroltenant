<?php

namespace App\Livewire\Admin\Profile;

use App\Models\User;
use App\Services\BunnyServices;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:2048|mimes:jpg,jpeg,png,gif,webp')]
    public $photo;

    public $user;
    public bool $showPhotoModal = false;

    public $photoUrl = null;

    public function mount($userId)
    {
        $this->user = User::findOrFail($userId);

        $this->photoUrl = $this->user->photo_path
            ? BunnyServices::url($this->user->photo_path)
            : null;
    }

    public function uploadPhoto(): void
    {
        $this->validate();

        if ($this->user->photo_path) {
            BunnyServices::delete($this->user->photo_path);
        }

        $path = BunnyServices::upload(
            $this->photo,
            'images/users'
        );

        $this->user->update([
            'photo_path' => $path,
        ]);

        $this->photoUrl = BunnyServices::url($path);

        $this->reset('photo', 'showPhotoModal');
    }

    public function deletePhoto(): void
    {
        if (!$this->user->photo_path) {
            return;
        }

        BunnyServices::delete($this->user->photo_path);

        $this->user->update([
            'photo_path' => null,
        ]);

        $this->photoUrl = null;
    }

    public function resetUploads(): void
    {
        $this->reset('photo');
    }


    public function render()
    {
        return view('livewire.admin.profile.image');
    }
}
