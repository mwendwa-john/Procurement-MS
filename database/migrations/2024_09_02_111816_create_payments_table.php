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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->date('payment_date');
            $table->foreignId('payed_by')->nullable()->constrained('users')->onDelete('set null');
            
            // Additional Columns
            $table->decimal('amount', 15, 2);
            $table->string('currency', 3)->default('KSH');
            $table->string('payment_method'); // Payment method (e.g., Credit Card, Bank Transfer)
            $table->string('status')->default('pending'); // Payment status (e.g., pending, completed, failed)
            $table->text('description')->nullable(); // Description or notes about the payment
        
            // Foreign Key Relationships
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->onDelete('cascade');
            $table->foreignId('hotel_id')->nullable()->constrained('hotels')->onDelete('set null');
        
            $table->timestamps();
            
            // Indexes
            $table->index('payment_date'); // Index for quick filtering by date
            $table->index('status'); // Index for quick filtering by status
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
