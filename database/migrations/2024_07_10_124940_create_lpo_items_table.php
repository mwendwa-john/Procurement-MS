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
        Schema::create('lpo_items', function (Blueprint $table) {
            $table->id();
            $table->string('lpo_item_number')->unique();
            $table->string('lpo_order_number'); // Relating to lpos table
            // Foreign key constraint on lpo_order_number
            $table->foreign('lpo_order_number')
                ->references('lpo_order_number')
                ->on('lpos')
                ->onDelete('cascade');

            $table->string('item_name');
            $table->string('description')->nullable();

            $table->integer('expected_quantity'); // Quantity expected
            $table->integer('delivered_quantity')->nullable(); // Quantity delivered
            $table->integer('pending_quantity')->nullable(); // Quantity not yet delivered

            $table->string('unit_of_measure');
            $table->decimal('price', 10, 2);
            $table->decimal('vat', 5, 2);
            $table->decimal('amount', 10, 2);

            $table->boolean('is_saved')->default(false);
            $table->boolean('is_delivered')->default(false);
            $table->boolean('is_pending')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lpo_items');
    }
};
