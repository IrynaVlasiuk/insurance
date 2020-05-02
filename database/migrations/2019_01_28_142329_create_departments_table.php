<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateDepartmentsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('departments', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code', 2)->nullable();
                $table->string('name', 100)->nullable();
                $table->unsignedInteger('area_id')->nullable();
                $table->foreign('area_id')->references('id')->on('areas');
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
            Schema::dropIfExists('departments');
        }
    }
