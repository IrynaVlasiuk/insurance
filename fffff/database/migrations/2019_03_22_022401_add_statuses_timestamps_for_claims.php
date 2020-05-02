<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AddStatusesTimestampsForClaims extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('claims', function (Blueprint $table) {
                $table->dateTime('validated_manager_at')->nullable();
                $table->dateTime('validated_chief_at')->nullable();
                $table->dateTime('validated_area_manager_at')->nullable();
                $table->dateTime('waivered_at')->nullable();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::table('claims', function (Blueprint $table) {
                $table->dropColumn('validated_manager_at');
                $table->dropColumn('validated_chief_at');
                $table->dropColumn('validated_area_manager_at');
                $table->dropColumn('waivered_at');
            });
        }
    }
