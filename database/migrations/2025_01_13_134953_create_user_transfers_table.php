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
        Schema::create('user_transfers', function (Blueprint $table) {
            $table->id();
        
            // Foreign key to users table
            $table->string('user_slug');
            $table->foreign('user_slug')
                ->references('slug')
                ->on('users')
                ->onDelete('cascade');
        
            $table->string('from_location');
            $table->string('to_location');
            $table->string('from_hotel');
            $table->string('to_hotel');
            $table->date('transfer_date');
            $table->string('transfer_reason')->nullable();
            $table->string('from_role')->nullable();
            $table->string('to_role');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_transfers');
    }
};
