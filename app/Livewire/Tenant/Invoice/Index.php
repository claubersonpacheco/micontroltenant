<?php

namespace App\Livewire\Tenant\Invoice;

use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Invoice')]
#[Layout('layouts.tenant.admin')]
class Index extends Component
{
    public $invoices;

    public function mount()
    {
        $this->invoices = Invoice::all();
    }

    public function viewXml($id)
    {
        $invoice = Invoice::findOrFail($id);

        // Gera se ainda não existe
        if (!$invoice->xml_url) {
            $invoice->generateXml();
        }

        $path = str_replace('/storage/', 'public/', $invoice->xml_url);
        $xmlContent = Storage::get($path);

        return response($xmlContent, 200)
            ->header('Content-Type', 'application/xml');
    }
    public function render()
    {
        return view('livewire.tenant.invoice.index');
    }
}
