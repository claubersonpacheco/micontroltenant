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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')
                ->constrained('budgets')
                ->onDelete('cascade');

            $table->foreignId('product_supplier_id')
                ->nullable()
                ->constrained('product_suppliers')
                ->onDelete('set null');

            $table->string('name');
            $table->string('category_expense')->nullable();
            $table->string('description')->nullable();
            $table->decimal('amount', 12, 2); // valor do gasto
            $table->date('expense_date')->nullable();
            $table->string('method_pay')->nullable();
            $table->boolean('factura')->nullable();
            $table->string('factura_path')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
