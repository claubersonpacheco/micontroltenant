<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use SimpleXMLElement;

class Invoice extends Model
{
    protected $fillable = [
        'budget_id',
        'customer_id',
        'user_id',
        'serie',
        'numero',
        'fecha_emision',
        'base_imponible',
        'tipo_iva',
        'cuota_iva',
        'importe_total',
        'hash_registro',
        'hash_registro_anterior',
        'estado_aeat',
        'pdf_url',
        'xml_url',
    ];

    // Relações
    public function budget()
    {
        return $this->belongsTo(Budget::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Gera e salva o PDF da fatura
     */
    public function generatePdf()
    {
        $dompdf = new Dompdf();
        $html = view('invoices.pdf', ['invoice' => $this])->render();

        $dompdf->loadHtml($html);
        $dompdf->render();

        $filename = "invoices/pdf/factura_{$this->id}.pdf";
        Storage::put($filename, $dompdf->output());

        $this->update(['pdf_url' => Storage::url($filename)]);
    }

    /**
     * Gera e salva o XML da fatura
     */
    public function generateXml()
    {
        $xml = new \SimpleXMLElement('<Factura/>');

        $xml->addChild('Serie', $this->serie);
        $xml->addChild('Numero', $this->numero);
        $xml->addChild('FechaExpedicionFactura', $this->fecha_emision);

        $cliente = $xml->addChild('Cliente');
        $cliente->addChild('Nombre', $this->customer->nombre ?? '');
        $cliente->addChild('NIF', $this->customer->nif ?? '');

        $totales = $xml->addChild('Totales');
        $totales->addChild('BaseImponible', $this->base_imponible);
        $totales->addChild('TipoIVA', $this->tipo_iva);
        $totales->addChild('CuotaIVA', $this->cuota_iva);
        $totales->addChild('ImporteTotalFactura', $this->importe_total);

        $filename = "invoices/xml/factura_{$this->id}.xml";
        Storage::put($filename, $xml->asXML());

        $this->update(['xml_url' => Storage::url($filename)]);
    }

    /**
     * Gera PDF e XML de uma vez
     */
    public function generateDocuments()
    {
        $this->generatePdf();
        $this->generateXml();
    }
}
