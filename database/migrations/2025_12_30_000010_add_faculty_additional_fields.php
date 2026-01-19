<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('faculties')) {
            return;
        }

        Schema::table('faculties', function (Blueprint $table) {
            if (!Schema::hasColumn('faculties', 'degree')) {
                $table->string('degree')->nullable()->after('designation');
            }
            if (!Schema::hasColumn('faculties', 'masters')) {
                $table->string('masters')->nullable()->after('degree');
            }
            if (!Schema::hasColumn('faculties', 'experience_years')) {
                $table->integer('experience_years')->default(0)->after('masters');
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
            if (!Schema::hasColumn('faculties', 'orcid_id')) {
                $table->string('orcid_id')->nullable()->after('vidwan_id');
            }
            if (!Schema::hasColumn('faculties', 'scopus_id')) {
                $table->string('scopus_id')->nullable()->after('orcid_id');
            }
            if (!Schema::hasColumn('faculties', 'google_scholar_id')) {
                $table->string('google_scholar_id')->nullable()->after('scopus_id');
            }
        });
    }

    public function down()
    {
        if (!Schema::hasTable('faculties')) {
            return;
        }

        Schema::table('faculties', function (Blueprint $table) {
            if (Schema::hasColumn('faculties', 'google_scholar_id')) {
                $table->dropColumn('google_scholar_id');
            }
            if (Schema::hasColumn('faculties', 'scopus_id')) {
                $table->dropColumn('scopus_id');
            }
            if (Schema::hasColumn('faculties', 'orcid_id')) {
                $table->dropColumn('orcid_id');
            }
            if (Schema::hasColumn('faculties', 'vidwan_id')) {
                $table->dropColumn('vidwan_id');
            }
            if (Schema::hasColumn('faculties', 'industrial_experience')) {
                $table->dropColumn('industrial_experience');
            }
            if (Schema::hasColumn('faculties', 'teaching_experience')) {
                $table->dropColumn('teaching_experience');
            }
            if (Schema::hasColumn('faculties', 'area_of_interest')) {
                $table->dropColumn('area_of_interest');
            }
            if (Schema::hasColumn('faculties', 'experience_years')) {
                $table->dropColumn('experience_years');
            }
            if (Schema::hasColumn('faculties', 'masters')) {
                $table->dropColumn('masters');
            }
            if (Schema::hasColumn('faculties', 'degree')) {
                $table->dropColumn('degree');
            }
        });
    }
};
