<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInseeToContractsAndClaims extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->string('insee',5)->nullable();
        });
        Schema::table('claims', function (Blueprint $table) {
            $table->string('insee',5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contracts', function (Blueprint $table) {
            $table->dropColumn('insee');
        });
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('insee');
        });
    }
}
