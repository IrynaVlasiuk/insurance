<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AlterPlotAreaClaimPlots extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('claim_plots', function (Blueprint $table) {
                $table->renameColumn('plot_area', 'plot_surface');
                $table->boolean('damaged')->default(0);
                $table->string('harvest_in')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            /** Delete If column Exists */
            if (Schema::hasColumn('claim_plots', 'damaged')) {
                Schema::table('claim_plots', function (Blueprint $table) {
                    $table->dropColumn('damaged');
                    $table->dropColumn('harvest_in');
                });
            }

            Schema::table('claim_plots', function (Blueprint $table) {
                $table->renameColumn('plot_surface', 'plot_area');
            });
        }
    }
