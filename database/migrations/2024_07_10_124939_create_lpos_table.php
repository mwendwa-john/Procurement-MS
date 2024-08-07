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
        Schema::create('lpos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->date('tax_date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->date('delivery_date')->nullable();

            $table->enum('status', [
                'generated',
                'posted',
                'added_to_daily_lpos',
                'approved',
                'invoice_attached',
            ])->default('generated');

            $table->decimal('subtotal', 15, 2)->nullable();
            $table->decimal('vat_total', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();

            $table->foreignId('generated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('added_to_daily_lpos_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('invoice_attached_by')->nullable()->constrained('users')->onDelete('set null');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpos');
    }
};
