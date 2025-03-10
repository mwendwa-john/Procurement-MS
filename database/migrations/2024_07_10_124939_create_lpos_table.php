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
            $table->string('lpo_order_number')->unique();  // Unique order number for each LPO
            $table->date('tax_date')->nullable();
            $table->string('payment_terms')->nullable();
            $table->date('delivery_date')->nullable();

            $table->enum('stage', [
                'created',
                'posted',
                'forwarded',
                'added_to_daily_lpos',
                'approved',
                'invoice_attached',
            ])->default('created');

            $table->enum('status', [
                'generated',
                'partially_delivered',
                'delivered',
            ])->default('generated');

            $table->decimal('subtotal', 15, 2)->nullable();
            $table->boolean('include_vat')->default(false);
            $table->decimal('vat_total', 15, 2)->nullable();
            $table->decimal('total_amount', 15, 2)->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('posted_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('forwarded_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('added_to_daily_lpos_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');

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
