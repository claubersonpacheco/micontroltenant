<?php

namespace App\Livewire\Tenant\User;

use App\Models\TenantUser;
use Livewire\Component;
use App\Traits\Alert;
use Livewire\Attributes\Renderless;

class Delete extends Component
{
    use Alert;

    public TenantUser $user; // usuário do tenant

    public bool $confirming = false;

    /**
     * Abre a confirmação de exclusão
     */
    #[Renderless]
    public function confirm(): void
    {
        $this->confirming = true;
    }

    /**
     * Executa a exclusão
     */
    public function delete(): void
    {
        $this->user->delete();

        // Dispara evento para parent Livewire atualizar listagem
        $this->dispatch('deleted');

        // Mensagem de sucesso via trait Alert
        $this->success('Usuário excluído com sucesso!');

        $this->confirming = false;
    }

    /**
     * Renderiza a view
     */
    public function render()
    {
        return view('livewire.tenant.user.delete');
    }
}
