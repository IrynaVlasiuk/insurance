<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateContractsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('contracts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('contract_number')->index();
                $table->string('offer',10)->nullable();
                $table->string('product',50)->nullable();
                $table->string('deductible_hazards_option',50)->nullable();
                $table->string('deductible_hail_option',50)->nullable();

                $table->string('option1',5)->nullable();
                $table->string('option2',5)->nullable();

                $table->string('note')->nullable();

                /**
                 * Customer
                 */
                $table->unsignedInteger('customer_id');
                $table->foreign('customer_id')->references('id')->on('tiers')->onDelete('restrict');

                /**
                 * Agent
                 */
                $table->unsignedInteger('agent_id');
                $table->foreign('agent_id')->references('id')->on('tiers')->onDelete('restrict');

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
            Schema::dropIfExists('contracts');
        }
    }
