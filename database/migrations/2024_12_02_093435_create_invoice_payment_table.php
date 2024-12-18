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
        Schema::create('invoice_payment', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->string('payment_number');
            $table->decimal('amount_paid', 15, 2);
            $table->decimal('invoice_balance', 15, 2);
            $table->timestamps();

            $table->foreign('invoice_number')
                ->references('invoice_number')
                ->on('invoices')
                ->onDelete('cascade');

            $table->foreign('payment_number')
                ->references('payment_number')
                ->on('payments')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_payment');
    }
};
