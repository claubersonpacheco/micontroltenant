<?php

namespace App\Livewire\Admin\Expense;

use App\Models\BudgetItem;
use App\Models\Expense;
use Livewire\Attributes\On;
use Livewire\Component;


class Delete extends Component
{
    public $itemId;


    public function mount($itemId)
    {
        $this->itemId = $itemId; // recebe o ID do item a ser deletado
    }


    public function delete()
    {
        $apiAccessKey = env('BUNNY_API_KEY_PASSWORD');
        $storageZone = env('BUNNY_STORAGE_ZONE');
        $storageRegion = env('BUNNY_STORAGE_REGION');

        $client = new \Bunny\Storage\Client($apiAccessKey, $storageZone, $storageRegion);

        $file = Expense::findOrFail($this->itemId);

        try {
            if ($file->invoice !== false) {
                // Deleta do BunnyCDN
                $result = $client->delete('micontrol/invoices/' . $file->filename);

                // Verifica se houve erro no delete remoto
                if ($result !== null) {
                    toastr()->error('Fail to delete: ' . $result);

                }
            }

            // Deleta do banco (sempre que o registro existir)
            $file->delete();
            $this->dispatch('closeModal');
            toastr()->success('Deleted successfully!');


        } catch (\Exception $e) {
            // Captura qualquer exceção
            toastr()->error('Error while deleting file: ' . $e->getMessage());

        }

    }


    public function render()
    {
        return view('livewire.admin.expense.delete');
    }

}
