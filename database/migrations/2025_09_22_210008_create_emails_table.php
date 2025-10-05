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
        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->foreignId('budget_id')->constrained()->onDelete('cascade'); // Relacionado ao orçamento
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relacionado ao cliente
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->string('subject');
            $table->string('recipient_email'); // E-mail do destinatário
            $table->string('additional_emails')->nullable();
            $table->text('message')->nullable(); // Mensagem opcional no e-mail
            $table->boolean('status')->default(false);
            $table->string('error_message')->nullable();
            $table->string('file')->nullable(); // C

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emails');
    }
};
