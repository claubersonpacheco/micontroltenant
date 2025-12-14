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
        Schema::create('plans', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique();
            $table->string('public_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();

            $table->decimal('price', 12, 2);
            $table->string('currency', 10);

            $table->enum('billing_period', ['monthly', 'yearly', 'lifetime']);

            $table->unsignedInteger('trial_days')->default(0);

            $table->unsignedInteger('max_users')->nullable();
            $table->unsignedInteger('max_projects')->nullable();
            $table->unsignedInteger('max_storage_mb')->nullable();

            $table->json('features')->nullable();

            $table->boolean('highlighted')->default(false);
            $table->boolean('is_active')->default(true);

            $table->unsignedInteger('order')->default(0);

            $table->decimal('tax_percentage', 5, 2)->default(0);

            $table->boolean('is_public')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
