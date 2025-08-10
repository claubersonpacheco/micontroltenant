<?php

namespace App\Traits;

use App\Models\Setting;

trait GenerateAutomaticCode
{
    public function generateCode($modelClass)
    {
        $prefix = Setting::getPrefix() ?? 'FS'; // Define o prefixo padrão
        $currentYear = date('Y');
        $modelInitials = strtoupper(substr(class_basename($modelClass), 0, 2));

        $codePattern = $prefix . $modelInitials . $currentYear . '-'; // Exemplo: FSUS2025-

        // Obtendo o último registro que possui código parecido com o padrão desejado
        $lastRecord = $modelClass::where('code', 'LIKE', $codePattern . '%')
            ->orderBy('id', 'desc')
            ->first();

        $nextCodeNumber = '0001'; // Número inicial padrão

        if ($lastRecord) {
            $lastCode = $lastRecord->code;

            // Extrai a parte numérica do código gerado anteriormente
            $lastNumber = (int)substr($lastCode, strlen($codePattern));

            // Incrementa o número e preenche com zeros à esquerda até 4 dígitos
            $nextCodeNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        }

        $nextCode = $codePattern . $nextCodeNumber;

        return $nextCode;
    }
}
