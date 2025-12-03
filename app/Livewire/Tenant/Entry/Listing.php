<?php

namespace App\Livewire\Tenant\Entry;

use App\Models\Budget;
use App\Models\Entry;
use App\Models\Expense;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('List Entry')]
#[Layout('layouts.tenant.admin')]
class Listing extends Component
{
    use WithPagination;

    public $budget;

    private $id;


    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column' => 'created_at',
        'direction' => 'desc',
    ];

    public function mount(int $id): void
    {
        $this->budget = Budget::findOrFail($id);

    }


    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Entry::query()
            ->with('budget')
            ->where('budget_id', $this->budget->id)
            ->when(
                $this->search !== null,
                fn($query) =>
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

        $file = Entry::findOrFail($id);

        try {
            if ($file->invoice !== false) {
                // Deleta do BunnyCDN
                $result = $client->delete('micontrol/receipt/' . $file->filename);

                // Verifica se houve erro no delete remoto
                if ($result !== null) {
                    toastr()->error('Fail to delete: ' . $result);
                    return redirect()->route('tenant.entry.budget.listing', $this->budget->id);
                }
            }

            // Deleta do banco (sempre que o registro existir)
            $file->delete();

            toastr()->success('Deleted successfully!');
            return redirect()->route('tenant.entry.budget.listing', $this->budget->id);

        } catch (\Exception $e) {
            // Captura qualquer exceção
            toastr()->error('Error while deleting file: ' . $e->getMessage());
            return redirect()->route('tenant.entry.budget.listing', $this->budget->id);
        }
    }

    public function render()
    {
        return view('livewire.tenant.entry.listing');
    }
}
