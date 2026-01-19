<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Make columns nullable to be tolerant of older schema and seeds
        Schema::table('faculties', function (Blueprint $table) {
            // Requires doctrine/dbal to support ->change()
            if (Schema::hasColumn('faculties', 'degree')) {
                $table->string('degree')->nullable()->change();
            }
            if (Schema::hasColumn('faculties', 'experience_years')) {
                $table->integer('experience_years')->nullable()->change();
            }
            if (Schema::hasColumn('faculties', 'photo_path')) {
                $table->string('photo_path')->nullable()->change();
            }
            if (Schema::hasColumn('faculties', 'masters')) {
                $table->string('masters')->nullable()->change();
            }
        });
    }

    public function down(): void
    {
        // Revert columns to not nullable (be careful: may fail if NULLs exist)
        Schema::table('faculties', function (Blueprint $table) {
            if (Schema::hasColumn('faculties', 'degree')) {
                $table->string('degree')->nullable(false)->change();
            }
            if (Schema::hasColumn('faculties', 'experience_years')) {
                $table->integer('experience_years')->nullable(false)->change();
            }
            if (Schema::hasColumn('faculties', 'photo_path')) {
                $table->string('photo_path')->nullable(false)->change();
            }
            if (Schema::hasColumn('faculties', 'masters')) {
                $table->string('masters')->nullable(false)->change();
            }
        });
    }
};