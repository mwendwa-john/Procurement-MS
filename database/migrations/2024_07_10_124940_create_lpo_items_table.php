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
            $table->foreignId('lpo_id')->constrained('lpos');
            $table->string('item');
            $table->string('description');
            $table->integer('quantity');
            $table->string('unit_of_measure');
            $table->decimal('price', 10, 2);
            $table->decimal('vat', 5, 2);
            $table->decimal('amount', 10, 2);
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
