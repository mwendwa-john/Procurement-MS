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
            $table->foreignId('lpo_id')->constrained('lpos')->onDelete('cascade');
            $table->string('invoice_number');
            
            $table->string('description');
            $table->integer('quantity');
            $table->string('unit_of_measure');
            $table->decimal('rate', 10, 2);
            $table->decimal('vat', 10, 2);
            $table->decimal('amount', 10, 2);

            $table->enum('status', [
                'unpaid',
                'payment_made',
                'payment_complete'
            ])->default('unpaid');
            
            $table->foreignId('payment_made_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('payment_completed_by')->nullable()->constrained('users')->onDelete('set null');

            $table->softDeletes();
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
