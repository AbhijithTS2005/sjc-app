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
            Schema::create('faculties', function (Blueprint $table) {
                $table->id();
                $table->string('name'); // Faculty Name
                $table->string('degree'); // e.g., B.Tech, B.Sc
                $table->string('masters')->nullable(); // Optional field
                $table->integer('experience_years'); // Number of years
                $table->string('photo_path'); // Stores the filename/path of the photo
                $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
