<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Try the Schema change first (requires doctrine/dbal for ->change()).
        try {
            Schema::table('faculties', function (Blueprint $table) {
                $table->string('department')->nullable()->change();
            });
        } catch (\Throwable $e) {
            // Fallback for MySQL without doctrine/dbal
            $driver = DB::getDriverName();
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE `faculties` MODIFY `department` VARCHAR(255) NULL");
            } elseif ($driver === 'sqlite') {
                // SQLite doesn't support altering columns; no-op (you may recreate table manually)
                // For now, just log a warning to the console
                info('Unable to alter `faculties.department` for sqlite; consider recreating the table in a migration.');
            } else {
                throw $e; // rethrow if unknown driver
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Revert to NOT NULL default if reversing
        try {
            Schema::table('faculties', function (Blueprint $table) {
                $table->string('department')->nullable(false)->change();
            });
        } catch (\Throwable $e) {
            $driver = DB::getDriverName();
            if ($driver === 'mysql') {
                DB::statement("ALTER TABLE `faculties` MODIFY `department` VARCHAR(255) NOT NULL");
            } else {
                // No reliable cross-DB revert; leave as-is and warn
                info('Unable to revert `faculties.department` nullability for this driver.');
            }
        }
    }
};
