<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateHistoryEntity extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('history_records', function (Blueprint $table) {
                $table->increments('id');

                $table->unsignedInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

                $table->string('module_name');
                $table->string('event_name');

                $table->string('source_entity_name')->nullable();
                $table->unsignedInteger('source_entity_id')->nullable();

                $table->string('destination_entity_name')->nullable();
                $table->unsignedInteger('destination_entity_id')->nullable();

                $table->text('details')->nullable();

                $table->boolean('success')->default(1);
                $table->boolean('is_system')->default(0);

                $table->string('error_details')->nullable();

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
            Schema::dropIfExists('history');
        }
    }
