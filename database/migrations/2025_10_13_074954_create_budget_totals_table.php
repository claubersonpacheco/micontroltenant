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
        Schema::create('budget_totals', function (Blueprint $table) {
            $table->id();

            // Relação com o orçamento principal
            $table->unsignedBigInteger('budget_id')->unique();
            $table->foreign('budget_id')
                ->references('id')
                ->on('budgets')
                ->onDelete('cascade');

            // 🧾 Valores detalhados dos itens
            $table->decimal('items_subtotal', 12, 2)->default(0);     // Total sem IVA
            $table->decimal('items_tax_total', 12, 2)->default(0);    // Valor total do IVA (que vai pra Hacienda)

            // 💸 Valores de movimentação
            $table->decimal('expenses_total', 12, 2)->default(0);     // Despesas (custos)
            $table->decimal('entries_total', 12, 2)->default(0);      // Entradas (pagamentos do cliente)

            // 💰 Totais consolidados
            $table->decimal('gross_total', 12, 2)->default(0);        // Subtotal + IVA (valor total do orçamento)
            $table->decimal('net_total', 12, 2)->default(0);          // Subtotal - Despesas (lucro potencial antes do IVA)

            // 💡 Valor previsto originalmente no orçamento
            $table->decimal('budget_value', 12, 2)->default(0);       // Pode guardar o valor acordado inicialmente

            // ⚖️ Diferenças e saldos
            $table->decimal('difference_total', 12, 2)->default(0);   // Entradas - Valor total do orçamento (saldo com cliente)
            $table->decimal('final_balance', 12, 2)->default(0);      // Entradas - Despesas - IVA (lucro real)

            // 🧾 Imposto e rentabilidade
            $table->decimal('iva_to_pay', 12, 2)->default(0);         // Valor de IVA a repassar à Hacienda
            $table->decimal('profit_margin', 8, 2)->default(0);       // Margem de lucro em %

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budegt_totals');
    }
};
