<?php

namespace App\Livewire\Tenant\Entry;

use App\Models\Budget;
use App\Models\BudgetTotal;
use App\Models\Entry;
use App\Services\BunnyServices;
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

    public ?BudgetTotal $totals = null;

    public $budget;
    public $fileUrl;

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

        $this->totals = $this->budget->summary;

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
        $entry = Entry::findOrFail($id);

        try {
            if ($entry->file_path) {
                BunnyServices::delete($entry->file_path);
            }

            $entry->delete();

            toastr()->success(__('Deleted successfully!'));

        } catch (\Throwable $e) {
            toastr()->error(__('Error while deleting: ') . $e->getMessage());
        }

        return redirect()->route(
            'tenant.entry.budget.listing',
            $this->budget->id
        );
    }


    public function render()
    {

        return view('livewire.tenant.entry.listing');
    }
}
