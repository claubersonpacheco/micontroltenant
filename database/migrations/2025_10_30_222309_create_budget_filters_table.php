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
        Schema::create('budget_filters', function (Blueprint $table) {
            $table->id();

            $table->foreignId('budget_id')
                ->constrained('budgets')
                ->onDelete('cascade');
            $table->boolean('show_bi_service')->default(true);
            $table->boolean('show_bi_description')->default(true);
            $table->boolean('show_bi_qtd')->default(true);
            $table->boolean('show_bi_price')->default(true);
            $table->boolean('show_bi_tax')->default(true);
            $table->boolean('show_bi_total')->default(true);
            $table->boolean('show_bi_tax_value')->default(true);
            $table->boolean('show_bi_sub_total')->default(true);

            $table->boolean('show_ex_code')->default(true);
            $table->boolean('show_ex_name')->default(true);
            $table->boolean('show_ex_description')->default(true);
            $table->boolean('show_ex_amount')->default(true);
            $table->boolean('show_ex_date')->default(true);
            $table->boolean('show_ex_method')->default(true);
            $table->boolean('show_ex_invoice_number')->default(true);
            $table->boolean('show_ex_filename')->default(true);
            $table->boolean('show_ex_file_path')->default(true);

            $table->boolean('show_en_code')->default(true);
            $table->boolean('show_en_name')->default(true);
            $table->boolean('show_en_description')->default(true);
            $table->boolean('show_en_amount')->default(true);
            $table->boolean('show_en_date')->default(true);
            $table->boolean('show_en_method')->default(true);
            $table->boolean('show_en_received_by')->default(true);
            $table->boolean('show_en_reference')->default(true);
            $table->boolean('show_en_receipt_number')->default(true);
            $table->boolean('show_en_filename')->default(true);
            $table->boolean('show_en_file_path')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_filters');
    }
};
