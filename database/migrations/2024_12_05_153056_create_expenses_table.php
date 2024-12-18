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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->decimal('amount', 10, 2);
            $table->text('description')->nullable();
            $table->string('unit_of_measure')->nullable();
            $table->integer('quantity')->nullable(); // Quantity not yet delivered

            $table->string('supplier_number'); // Reference to the unique supplier_number

            // Define foreign key constraints
            $table->foreign('supplier_number')
                ->references('supplier_number')
                ->on('suppliers')
                ->onDelete('cascade');

            $table->string('expense_category_code'); // Foreign key to expense_categories
            $table->foreign('expense_category_code')
                ->references('category_code')
                ->on('expense_categories')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
