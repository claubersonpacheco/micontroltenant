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
        Schema::create('entries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('budget_id')
                ->constrained()
                ->onDelete('cascade'); // se o orçamento for excluído, apaga as entradas

            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->onDelete('set null');

            $table->string('code');
            $table->string('name');
            $table->dateTime('date')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('method')->nullable(); // transferência, cartão, etc.
            $table->text('description')->nullable();
            $table->string('received_by')->nullable();
            $table->string('reference')->nullable(); // código interno ou recibo

            $table->boolean('receipt')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('filename')->nullable();
            $table->string('file_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entries');
    }
};
