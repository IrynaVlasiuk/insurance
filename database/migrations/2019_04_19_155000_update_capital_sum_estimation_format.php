<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCapitalSumEstimationFormat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claim_plots', function (Blueprint $table) {
            $table->dropColumn('capital_sum_estimation');
        });
        Schema::table('claim_plots', function (Blueprint $table) {
            $table->decimal('capital_sum_estimation',10,2)->nullable();
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
            $table->dropColumn('capital_sum_estimation');
        });
    }
}
