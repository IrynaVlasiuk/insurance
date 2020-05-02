<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObjectNumberToClaimPlots extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claim_plots', function (Blueprint $table) {
            $table->integer('object_number')->nullable();
            $table->integer('plot_number')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claim_plots', function (Blueprint $table) {
            $table->dropColumn('object_number');
        });
    }
}
