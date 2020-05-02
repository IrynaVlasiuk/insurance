<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreatePlotsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * Contract Can Have Many Plots
         * We Use contract_id as our local unique index
         * And contract_number as cross-application unique index
         *
         * @return void
         */
        public function up()
        {
            Schema::create('claim_plots', function (Blueprint $table) {
                $table->increments('id');
                /**
                 * Claim ID
                 */
                $table->unsignedInteger('claim_id');
                $table->foreign('claim_id')->references('id')->on('claims');

                /**
                 * Important fields
                 */
                $table->integer('plot_number');
                $table->string('plot_name',60)->nullable();
                $table->string('insee',5)->nullable();

                $table->string('crop_code',10)->nullable();
                $table->string('crop_name',100)->nullable();
                $table->string('crop_variety',100)->nullable();
                $table->string('plot_area',10)->nullable();
                $table->decimal('yield',10,0)->nullable();
                $table->integer('yield_increase')->nullable();
                $table->decimal('unit_price',10,0)->nullable();
                $table->string('deductible_hail_plot',20)->nullable();
                $table->string('storm_plot',20)->nullable();
                $table->string('deductible_storm_plot',20)->nullable();
                $table->string('quality',10)->nullable();
                $table->string('sandstorm',10)->nullable();

                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('claim_plots');
        }
    }
