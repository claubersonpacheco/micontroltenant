<?php

namespace App\Services;

use App\Models\Invoice;
use Illuminate\Support\Facades\Log;

class VerifactuService
{
    /**
     * Gera o JSON Veri*factu para uma factura
     */
    public function generateJson(Invoice $invoice): array
    {
        $data = [
            'factura' => [
                'serie' => $invoice->serie,
                'numero' => $invoice->numero,
                'fechaExpedicion' => $invoice->fecha_emision->format('Y-m-d'),
                'emisor' => [
                    'nif' => config('verifactu.emisor_nif'),
                    'nombre' => config('verifactu.emisor_nombre'),
                ],
                'cliente' => [
                    'nif' => $invoice->cliente_nif,
                    'nombre' => $invoice->cliente_nombre,
                ],
                'impuestos' => [
                    [
                        'baseImponible' => (float)$invoice->base_imponible,
                        'tipoIVA' => (float)$invoice->tipo_iva,
                        'cuotaIVA' => (float)$invoice->cuota_iva,
                    ]
                ],
                'totalFactura' => (float)$invoice->total,
                'hash' => $this->generateHash($invoice),
                'timestamp' => now()->toIso8601String(),
            ]
        ];

        return $data;
    }

    /**
     * Gera um hash único para garantir integridade
     */
    private function generateHash(Invoice $invoice): string
    {
        $string = $invoice->serie
            . $invoice->numero
            . $invoice->fecha_emision
            . $invoice->base_imponible
            . $invoice->tipo_iva
            . $invoice->cuota_iva
            . $invoice->total;

        return hash('sha256', $string);
    }
}
