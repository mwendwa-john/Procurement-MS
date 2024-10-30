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
            $table->string('invoice_number')->unique();
            $table->string('lpo_order_number'); // Relating to lpos table

            // Foreign key constraint on lpo_order_number
            $table->foreign('lpo_order_number')
                ->references('lpo_order_number')
                ->on('lpos')
                ->onDelete('cascade');

            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');

            // Add the recursive relationship (parent invoice)
            $table->foreignId('parent_invoice_id')->nullable()->constrained('invoices')->onDelete('cascade');

            $table->date('delivery_date');
            $table->string('comments')->nullable();
            $table->enum('status', [
                'unpaid',
                'payment_made',
                'payment_complete'
            ])->default('unpaid');

            $table->decimal('subtotal', 15, 2)->nullable();
            $table->decimal('vat_total', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();
            
            $table->foreignId('invoice_attached_by')->nullable()->constrained('users')->onDelete('set null');


            $table->boolean('is_final')->default(false); // Indicates if this invoice completes delivery
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
