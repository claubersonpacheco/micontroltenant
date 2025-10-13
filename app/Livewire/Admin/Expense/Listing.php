<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Budget;
use App\Models\Expense;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Listing Expense')]
class Listing extends Component
{
    use WithPagination;

    public $budgetId;

    private $id;


    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    public function mount(int $id): void
    {
        $this->budgetId = Budget::findOrFail($id);

    }


    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Expense::query()
            ->with('budget')
            ->where('budget_id', $this->budgetId->id)
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['name'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id)
    {
        $apiAccessKey = env('BUNNY_API_KEY_PASSWORD');
        $storageZone = env('BUNNY_STORAGE_ZONE');
        $storageRegion = env('BUNNY_STORAGE_REGION');

        $client = new \Bunny\Storage\Client($apiAccessKey, $storageZone, $storageRegion);

        $file = Expense::findOrFail($id);

        try {
            if ($file->invoice !== false) {
                // Deleta do BunnyCDN
                $result = $client->delete('micontrol/invoices/' . $file->filename);

                // Verifica se houve erro no delete remoto
                if ($result !== null) {
                    toastr()->error('Fail to delete: ' . $result);
                    return redirect()->route('expense.budget.listing', $this->budgetId->id);
                }
            }

            // Deleta do banco (sempre que o registro existir)
            $file->delete();

            toastr()->success('Deleted successfully!');
            return redirect()->route('expense.budget.listing', $this->budgetId->id);

        } catch (\Exception $e) {
            // Captura qualquer exceção
            toastr()->error('Error while deleting file: ' . $e->getMessage());
            return redirect()->route('expense.budget.listing', $this->budgetId->id);
        }
    }


    public function render()
    {
        return view('livewire.admin.expense.listing');
    }
}
