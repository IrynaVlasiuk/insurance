<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateTiersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('tier_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('tiers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('firstname', 50)->nullable();
                $table->string('lastname', 50)->nullable();
                $table->string('company', 50)->nullable();
                $table->string('address1')->nullable();
                $table->string('address2')->nullable();
                $table->string('zipcode', 10)->nullable();
                $table->string('city', 60)->nullable();
                $table->string('landline', 20)->nullable();
                $table->string('mobile', 20)->nullable();
                $table->string('fax', 20)->nullable();
                $table->string('email', 60)->nullable();

                $table->unsignedInteger('type_id')->nullable();
                $table->foreign('type_id')->references('id')->on('tier_types');

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
            Schema::dropIfExists('tiers');
            Schema::dropIfExists('tier_types');
        }
    }
