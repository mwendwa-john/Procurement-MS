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
            $table->string('payment_number')->unique();
            $table->date('payment_date');
            $table->foreignId('payed_by')->nullable()->constrained('users')->onDelete('set null');

            // Additional Columns
            $table->decimal('amount_paid', 15, 2);
            $table->text('description')->nullable(); // Description or notes about the payment
            $table->string('payment_method');
            $table->timestamps();

            // Index for quick filtering
            $table->index('payment_number'); 
            $table->index('payment_date'); // Index for quick filtering by date
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
