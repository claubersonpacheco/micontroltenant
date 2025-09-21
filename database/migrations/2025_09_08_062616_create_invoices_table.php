<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            // Relações
            $table->foreignId('budget_id')->constrained()->cascadeOnDelete();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Dados básicos da fatura
            $table->string('serie');
            $table->string('numero');
            $table->date('fecha_emision');

            // Valores fiscais
            $table->decimal('base_imponible', 12, 2);
            $table->decimal('tipo_iva', 5, 2);
            $table->decimal('cuota_iva', 12, 2);
            $table->decimal('importe_total', 12, 2);

            // Integração AEAT (Veri*factu)
            $table->string('hash_registro')->nullable();
            $table->string('hash_registro_anterior')->nullable();
            $table->string('estado_aeat')->default('pendente');

            // Armazenamento de ficheiros
            $table->string('pdf_url')->nullable();
            $table->string('xml_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
