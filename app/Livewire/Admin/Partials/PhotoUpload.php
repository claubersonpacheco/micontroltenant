<?php

namespace App\Livewire\Admin\Partials;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class PhotoUpload extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:2048|mimes:jpg,jpeg,png,gif,webp')]
    public $photo;

    public $userId;
    public $user;
    public $showModal = false;
    public $uploading = false;

    public function mount($userId)
    {
        $this->userId = $userId;
        $this->user = User::find($userId);

        if (!$this->user) {
            abort(404, 'Usuário não encontrado.');
        }
    }

    public function updatedPhoto()
    {
        $this->validateOnly('photo');
    }

    public function savePhoto()
    {
        $this->validate();

        if (!$this->photo) {
            $this->addError('photo', 'Selecione uma foto para enviar');
            return;
        }

        $this->uploading = true;

        try {
            // Deletar foto anterior, se existir
            if ($this->user->photo_path) {
                Storage::disk('public')->delete($this->user->photo_path);
            }

            // Nome do arquivo
            $fileName = time() . '_' . $this->photo->getClientOriginalName();

            // Upload usando Livewire (sem file_get_contents)
            $path = $this->photo->storeAs('images/user', $fileName, 'public');

            // Atualizar dados do usuário
            $this->user->update([
                'photo_path' => $path,
                'photo_original_name' => $this->photo->getClientOriginalName(),
                'photo_mime_type' => $this->photo->getClientMimeType(),
                'photo_size' => $this->photo->getSize(),
            ]);

            $this->user->refresh();
            $this->reset('photo', 'showModal');
            $this->dispatch('photo-uploaded', 'Foto atualizada com sucesso!');
            $this->dispatch('user-photo-updated', $this->userId);

        } catch (\Exception $e) {
            $this->addError('photo', 'Erro ao processar a foto: ' . $e->getMessage());
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
            $this->dispatch('photo-deleted', 'Foto removida com sucesso!');
            $this->dispatch('user-photo-updated', $this->userId);

        } catch (\Exception $e) {
            $this->addError('general', 'Erro ao remover a foto: ' . $e->getMessage());
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
        return view('livewire.admin.partials.photo-upload');
    }
}
