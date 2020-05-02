<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AlterYieldAndSurface extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('claim_plots', function (Blueprint $table) {
                $table->decimal('yield',10,2)->change();
                $table->decimal('plot_surface',10,4)->change();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {

        }
    }
