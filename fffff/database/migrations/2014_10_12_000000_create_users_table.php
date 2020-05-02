<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUsersTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            /**
             * User Roles
             */
            Schema::create('user_scopes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            /**
             * User Roles
             */
            Schema::create('user_types', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });


            /**
             * Users
             */
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('firstname');
                $table->string('lastname');
                $table->string('login');
                $table->string('address1')->nullable();
                $table->string('address2')->nullable();
                $table->string('zipcode', 10)->nullable();
                $table->string('city', 60)->nullable();
                $table->string('phone', 60)->nullable();
                $table->unsignedInteger('type_id')->nullable();
                $table->foreign('type_id')->references('id')->on('user_types')->onDelete('restrict');
                $table->unsignedInteger('scope_id')->nullable();
                $table->foreign('scope_id')->references('id')->on('user_scopes')->onDelete('restrict');
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            });

            /**
             * Areas
             */
            Schema::create('areas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code')->nullable();
                $table->string('name')->nullable();
                $table->unsignedInteger('area_manager_id')->nullable();
                $table->foreign('area_manager_id')->references('id')->on('users');
                $table->timestamps();
            });

            Schema::table('users', function (Blueprint $table) {
                $table->unsignedInteger('area_id')->nullable();
                $table->foreign('area_id')->references('id')->on('areas')->onDelete('set null');
            });

        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('users', function($table)
            {
                $table->dropForeign('users_area_id_foreign');
                $table->dropColumn('area_id');
            });

            Schema::dropIfExists('areas');
            Schema::dropIfExists('users');
            Schema::dropIfExists('user_types');
            Schema::dropIfExists('user_scopes');
        }
    }
