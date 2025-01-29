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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');   // Reference to the invoice number
            $table->string('lpo_item_number');  // Reference to the unique LPO item number

            // Define foreign key constraints
            $table->foreign('invoice_number')
            ->references('invoice_number')->on('invoices')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('lpo_item_number')
            ->references('lpo_item_number')->on('lpo_items')
            ->onDelete('cascade');

            $table->integer('quantity_delivered')->nullable();  // Track delivered quantity for this item in this invoice
            $table->integer('quantity_pending')->nullable();  // Track pending quantity for this item in this invoice
            $table->decimal('invoice_amount', 10, 2);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
