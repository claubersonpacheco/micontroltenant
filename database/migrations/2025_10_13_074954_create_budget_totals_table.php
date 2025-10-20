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

            $table->unsignedBigInteger('budget_id')->unique();
            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');

            // Valores detalhados
            $table->decimal('items_subtotal', 10, 2)->default(0);
            $table->decimal('items_tax_total', 10, 2)->default(0);
            $table->decimal('expenses_total', 10, 2)->default(0);
            $table->decimal('entries_total', 10, 2)->default(0);

            // Totais consolidados
            $table->decimal('gross_total', 10, 2)->default(0);       // Subtotal + Impostos
            $table->decimal('net_total', 10, 2)->default(0);         // Bruto - Despesas

            // 💡 Valor orçado originalmente (presupuesto)
            $table->decimal('budget_value', 10, 2)->default(0);      // Previsto no planejamento

            // Diferenças
            $table->decimal('difference_total', 10, 2)->default(0);  // budget_value - net_total
            $table->decimal('final_balance', 10, 2)->default(0);     // entries_total - net_total
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
