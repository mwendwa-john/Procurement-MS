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
            $table->foreignId('lpo_id')->constrained('lpos')->onDelete('cascade');
            $table->string('item_name');
            $table->string('description')->nullable();
            $table->integer('quantity');
            $table->string('unit_of_measure');
            $table->decimal('price', 10, 2);
            $table->decimal('vat', 5, 2);
            $table->decimal('amount', 10, 2);
            $table->boolean('is_saved')->default(false);
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
