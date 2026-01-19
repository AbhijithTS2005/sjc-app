<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Grammars\MySqlGrammar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update old department codes to new ones in users table
        DB::table('users')->where('department', 'bcom')->update(['department' => 'commerce']);
        DB::table('users')->where('department', 'bba')->update(['department' => 'managementstudies']);
        DB::table('users')->where('department', 'msw')->update(['department' => 'socialwork']);

        // Update old department codes to new ones in faculty table if it exists
        if (Schema::hasTable('faculty')) {
            DB::table('faculty')->where('department', 'bcom')->update(['department' => 'commerce']);
            DB::table('faculty')->where('department', 'bba')->update(['department' => 'managementstudies']);
            DB::table('faculty')->where('department', 'msw')->update(['department' => 'socialwork']);
        }

        // Update old department codes to new ones in events table if it exists
        if (Schema::hasTable('events')) {
            DB::table('events')->where('department', 'bcom')->update(['department' => 'commerce']);
            DB::table('events')->where('department', 'bba')->update(['department' => 'managementstudies']);
            DB::table('events')->where('department', 'msw')->update(['department' => 'socialwork']);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Rollback: update new codes back to old ones
        DB::table('users')->where('department', 'commerce')->update(['department' => 'bcom']);
        DB::table('users')->where('department', 'managementstudies')->update(['department' => 'bba']);
        DB::table('users')->where('department', 'socialwork')->update(['department' => 'msw']);

        DB::table('faculty')->where('department', 'commerce')->update(['department' => 'bcom']);
        DB::table('faculty')->where('department', 'managementstudies')->update(['department' => 'bba']);
        DB::table('faculty')->where('department', 'socialwork')->update(['department' => 'msw']);

        DB::table('events')->where('department', 'commerce')->update(['department' => 'bcom']);
        DB::table('events')->where('department', 'managementstudies')->update(['department' => 'bba']);
        DB::table('events')->where('department', 'socialwork')->update(['department' => 'msw']);
    }
};
