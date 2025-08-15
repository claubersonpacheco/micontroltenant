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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->unique();
            $table->string('description')->nullable();

            $table->decimal('total', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2)->default(0);

            $table->decimal('tax_value', 10, 2)->default(0);

            $table->boolean('show_service')->default(true);
            $table->boolean('show_description')->default(true);
            $table->boolean('show_qtd')->default(true);
            $table->boolean('show_price')->default(true);
            $table->boolean('show_tax')->default(true);
            $table->boolean('show_total')->default(true);
            $table->boolean('show_tax_value')->default(true);
            $table->boolean('show_sub_total')->default(true);

            $table->date('date')->nullable();
            $table->date('expirate')->nullable();
            $table->integer('total_expirate')->default(0);


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
