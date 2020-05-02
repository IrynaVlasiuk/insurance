<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToEntities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('surveys', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('tiers', function (Blueprint $table) {
            $table->softDeletes();
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('tiers', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });

        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('deleted_at');
        });
    }
}
