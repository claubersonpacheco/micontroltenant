<?php

namespace App\Livewire\Tenant\Partials;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PhotoUpload extends Component
{
    use WithFileUploads;

    public $photo;
    public $userId;
    public $user;
    public $showModal = false;
    public $uploading = false;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::findOrFail($userId);
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
        ]);
    }

    public function savePhoto()
    {


        $this->validate([
            'photo' => 'required|image|max:2048|mimes:jpg,jpeg,png,gif,webp',
        ]);

        $this->uploading = true;

        try {
            // Deleta a foto anterior
            $disk = 'public'; // disco customizado para tenants

// Deletar foto antiga (se houver)
            if ($this->user->photo_path) {
                Storage::disk($disk)->delete($this->user->photo_path);
            }

// Salvar nova foto no disco tenant
            $fileName = time() . '_' . $this->photo->getClientOriginalName();

            $path = $this->photo->storeAs('images/user', $fileName, $disk);

            // Atualiza o usuário
            $this->user->update([
                'photo_path' => $path,
                'photo_original_name' => $this->photo->getClientOriginalName(),
                'photo_mime_type' => $this->photo->getClientMimeType(),
                'photo_size' => $this->photo->getSize(),
            ]);

            $this->user->refresh();
            $this->reset('photo', 'showModal');
            $this->dispatch('photo-uploaded');
        } catch (\Exception $e) {
            $this->addError('photo', 'Erro ao salvar: ' . $e->getMessage());
        } finally {
            $this->uploading = false;
        }
    }

    public function deletePhoto()
    {
        try {
            if ($this->user->photo_path) {
                Storage::disk('public')->delete($this->user->photo_path);
            }

            $this->user->update([
                'photo_path' => null,
                'photo_original_name' => null,
                'photo_mime_type' => null,
                'photo_size' => null,
            ]);

            $this->user->refresh();
            $this->dispatch('photo-deleted');
        } catch (\Exception $e) {
            $this->addError('general', 'Erro ao remover a foto.');
        }
    }

    public function openModal()
    {
        $this->showModal = true;
        $this->reset('photo');
        $this->resetErrorBag();
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset('photo');
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.tenant.partials.photo-upload');
    }
}
