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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->text('description');
            $table->text('content');
            $table->string('image')->nullable();
            $table->enum('type', ['academic', 'sports', 'cultural', 'placement', 'social'])->default('academic');
            $table->enum('status', ['approved', 'pending', 'rejected'])->default('approved');
            $table->timestamps();
            
            // Index for faster queries
            $table->index('date');
            $table->index('type');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
