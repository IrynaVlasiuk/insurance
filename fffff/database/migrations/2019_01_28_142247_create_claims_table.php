<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateClaimsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {

            Schema::create('claim_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            /**
             * Claims
             * HasMany Plot
             *
             * Belongs To Contract
             *
             * belongs to Users (Chief / Manager assessors)
             * One Claim can have one Chief, Manager and Many (pivot) Assistant assessors
             */

            Schema::create('claims', function (Blueprint $table) {
                $table->increments('id');

                $table->string('external_id', 10)->nullable();
                $table->string('external_system', 10)->nullable();


                $table->string('contract_number', 10)->default(0);

                $table->string('damage_type', 50)->nullable();


                /**
                 * Contract
                 */
                $table->unsignedInteger('contract_id')->nullable();
                $table->foreign('contract_id')->references('id')->on('contracts');

                /**
                 * Experts
                 */
                $table->unsignedInteger('chief_assessor_id')->nullable();
                $table->foreign('chief_assessor_id')->references('id')->on('users');
                $table->unsignedInteger('manager_assessor_id')->nullable();
                $table->foreign('manager_assessor_id')->references('id')->on('users');

                /**
                 * Area
                 */
                $table->unsignedInteger('area_id')->nullable();
                $table->foreign('area_id')->references('id')->on('areas');

                /**
                 * Claim Statuses
                 */
                $table->unsignedInteger('status_id')->nullable();
                $table->foreign('status_id')->references('id')->on('claim_statuses');

                $table->date('happened_at')->nullable();
                $table->timestamps();
            });

            Schema::create('assistant_to_claim', function (Blueprint $table) {
                $table->primary(['assistant_assessor_id', 'claim_id']);
                $table->unsignedInteger('assistant_assessor_id');
                $table->foreign('assistant_assessor_id')->references('id')->on('users');
                $table->unsignedInteger('claim_id');
                $table->foreign('claim_id')->references('id')->on('claims');
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
            Schema::dropIfExists('assistant_to_claim');
            Schema::dropIfExists('claims');
            Schema::dropIfExists('claim_statuses');
        }
    }
