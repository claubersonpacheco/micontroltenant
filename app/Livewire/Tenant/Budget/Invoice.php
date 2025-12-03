<?php

namespace App\Livewire\Tenant\Budget;

use App\Models\Budget;
use App\Models\Customer;
use Livewire\Component;

use Livewire\Attributes\Computed;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use Spatie\ArrayToXml\ArrayToXml;
use Spatie\Browsershot\Browsershot;

#[Title('Invoice')]
#[Layout('layouts.tenant.admin')]
class Invoice extends Component
{
    use WithPagination;



    public $customer_id;
    public $items = [];
    public $customers;

    public function mount()
    {
        $this->customers = Customer::all();
        $this->items = [
            ['description' => '', 'quantity' => 1, 'price' => 0]
        ];
    }


    public function submit()
    {
        $invoice = Invoice::create([
            'user_id' => auth()->id(),
            'customer_id' => $this->customer_id,
            'date' => now(),
            'items' => $this->items,
            'total' => $this->calculateTotal(),
        ]);

        $this->generatePdf($invoice);
        $this->generateXml($invoice);

        session()->flash('success', 'Factura creada con PDF y XML.');
        return redirect()->route('tenant.invoices.show', $invoice);
    }

    protected function generatePdf(Invoice $invoice)
    {
        $html = view('invoices.pdf', compact('invoice'))->render();
        $path = "invoices/{$invoice->id}.pdf";

        Browsershot::html($html)
            ->format('A4')
            ->save(public_path($path));

        $invoice->update(['pdf_path' => $path]);
    }

    protected function generateXml(Invoice $invoice)
    {
        $data = [
            'InvoiceNumber' => $invoice->id,
            'Date' => $invoice->date->format('Y-m-d'),
            'Customer' => [
                'Name' => $invoice->customer->name,
                'VAT' => $invoice->customer->vat,
            ],
            'Total' => $invoice->total,
            'Items' => [],
        ];

        foreach ($invoice->items as $item) {
            $data['Items'][] = [
                'Description' => $item['description'],
                'Quantity' => $item['quantity'],
                'UnitPrice' => $item['price'],
            ];
        }

        $xml = ArrayToXml::convert($data, 'Facturae', true, 'UTF-8');
        $path = "invoices/{$invoice->id}.xml";
        file_put_contents(public_path($path), $xml);

        $invoice->update(['xml_path' => $path]);
    }

    public function render()
    {
        return view('livewire.tenant.budget.invoice');
    }
}

