<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateAssesmentsEntity extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('assessment_statuses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('assessment_damage_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('assessment_compensation_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('assessments', function (Blueprint $table) {
                $table->increments('id');

                /** BelongsTo Survey */
                $table->unsignedInteger('survey_id')->nullable();
                $table->foreign('survey_id')->references('id')->on('surveys')->onDelete('cascade');

                /** BelongsTo ClaimPlot */
                $table->unsignedInteger('claim_plot_id')->nullable();
                $table->foreign('claim_plot_id')->references('id')->on('claim_plots')->onDelete('cascade');

                /** Assesment Damage Type */
                $table->unsignedInteger('assessment_damage_type_id')->nullable();
                $table->foreign('assessment_damage_type_id')->references('id')->on('assessment_damage_types')->onDelete('restrict');

                $table->integer('cost_estimation')->nullable()->comment('loss');

                /** BelongsTo Assessment Compensation Type*/
                $table->unsignedInteger('assessment_compensation_type_id')->nullable();
                $table->foreign('assessment_compensation_type_id')->references('id')->on('assessment_compensation_types')->onDelete('restrict');

                /** BelongsTo Assessment Compensation Type*/
                $table->unsignedInteger('assessment_status_id')->nullable();
                $table->foreign('assessment_status_id')->references('id')->on('assessment_statuses')->onDelete('restrict');

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
            Schema::dropIfExists('assessments');
            Schema::dropIfExists('assessment_statuses');
            Schema::dropIfExists('assessment_compensation_types');
            Schema::dropIfExists('assessment_damage_types');
        }
    }
