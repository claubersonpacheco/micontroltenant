<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Attributes\Computed;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Setting')]
class Index extends Component
{
    use WithPagination;

    public ?int $quantity = 5;
    public ?string $search = null;

    public array $sort = [
        'column'    => 'created_at',
        'direction' => 'desc',
    ];

    #[Computed]
    public function rows(): LengthAwarePaginator
    {
        return Setting::query()
            ->when($this->search !== null, fn ($query) =>
            $query->whereAny(['title', 'email'], 'like', '%' . trim($this->search) . '%')
            )
            ->orderBy(...array_values($this->sort))
            ->paginate($this->quantity)
            ->withQueryString();
    }

    public function delete(int $id): void
    {
        Setting::findOrFail($id)->delete();
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.setting.index');
    }
}
