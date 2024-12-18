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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('address_id')->constrained()->onDelete('cascade');
            $table->string('supplier_name');
            $table->string('supplier_number')->unique(); 
            $table->string('slug')->unique()->index();
            $table->string('phone_number')->nullable();
            $table->string('email')->unique();
            $table->enum('category', [
                'credit',
                'cash',
                'other'
            ]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
