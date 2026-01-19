<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // If the faculties table already exists (older migration), add missing columns instead
        if (Schema::hasTable('faculties')) {
            Schema::table('faculties', function (Blueprint $table) {
                if (!Schema::hasColumn('faculties', 'department')) {
                    // add as nullable when patching an existing table to avoid failures if rows already exist
                    $table->string('department')->nullable()->after('name');
                }
                if (!Schema::hasColumn('faculties', 'designation')) {
                    $table->string('designation')->nullable()->after('department');
                }
                if (!Schema::hasColumn('faculties', 'qualification')) {
                    $table->text('qualification')->nullable()->after('designation');
                }
                if (!Schema::hasColumn('faculties', 'area_of_interest')) {
                    $table->text('area_of_interest')->nullable()->after('qualification');
                }
                if (!Schema::hasColumn('faculties', 'teaching_experience')) {
                    $table->text('teaching_experience')->nullable()->after('area_of_interest');
                }
                if (!Schema::hasColumn('faculties', 'industrial_experience')) {
                    $table->text('industrial_experience')->nullable()->after('teaching_experience');
                }
                if (!Schema::hasColumn('faculties', 'vidwan_id')) {
                    $table->string('vidwan_id')->nullable()->after('industrial_experience');
                }
                if (!Schema::hasColumn('faculties', 'degree')) {
                    $table->string('degree')->nullable()->after('vidwan_id');
                }
                if (!Schema::hasColumn('faculties', 'masters')) {
                    $table->string('masters')->nullable()->after('degree');
                }
                if (!Schema::hasColumn('faculties', 'experience_years')) {
                    $table->integer('experience_years')->default(0)->after('masters');
                }
                if (!Schema::hasColumn('faculties', 'orcid_id')) {
                    $table->string('orcid_id')->nullable()->after('vidwan_id');
                }
                if (!Schema::hasColumn('faculties', 'scopus_id')) {
                    $table->string('scopus_id')->nullable()->after('orcid_id');
                }
                if (!Schema::hasColumn('faculties', 'google_scholar_id')) {
                    $table->string('google_scholar_id')->nullable()->after('scopus_id');
                }
                if (!Schema::hasColumn('faculties', 'photo_path')) {
                    $table->string('photo_path')->nullable()->after('google_scholar_id');
                }

                // ensure department is indexed
                $table->index('department');
            });

            return;
        }

        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department'); // department slug or name, used for scoping
            $table->string('designation')->nullable();
            $table->string('degree')->nullable();
            $table->string('masters')->nullable();
            $table->integer('experience_years')->default(0);
            $table->text('qualification')->nullable();
            $table->text('area_of_interest')->nullable();
            $table->text('teaching_experience')->nullable();
            $table->text('industrial_experience')->nullable();
            $table->string('vidwan_id')->nullable();
            $table->string('orcid_id')->nullable();
            $table->string('scopus_id')->nullable();
            $table->string('google_scholar_id')->nullable();
            $table->string('photo_path')->nullable();
            $table->timestamps();

            $table->index('department');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
};
