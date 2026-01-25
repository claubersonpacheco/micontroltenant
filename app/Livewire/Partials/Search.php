<?php

namespace App\Livewire\Partials;

use Livewire\Component;

class Search extends Component
{
    public $searchTerm;

    public function search()
    {
        $this->dispatch('searchData', searchTerm: $this->searchTerm);
    }
    public function render()
    {
        return view('livewire.partials.search');
    }
}
