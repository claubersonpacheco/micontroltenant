<div>

{{--    @foreach($budgets as $budget)--}}
{{--        <div class="flex justify-between items-center">--}}
{{--            <div>{{ $budget->name }} - Total: €{{ $budget->total }}</div>--}}
{{--            <button wire:click="createInvoiceFromBudget({{ $budget->id }})"--}}
{{--                    class="bg-green-500 text-white px-3 py-1">--}}
{{--                Generar Factura--}}
{{--            </button>--}}
{{--        </div>--}}
{{--        @endforeach--}}

    {{-- Because she competes with no one, no one can compete with her. --}}
    @if($invoice->pdf_path)
        <a href="{{ asset($invoice->pdf_path) }}" target="_blank">Descargar PDF</a>
    @endif
    @if($invoice->xml_path)
        <a href="{{ asset($invoice->xml_path) }}" target="_blank">Descargar XML</a>
    @endif
</div>
