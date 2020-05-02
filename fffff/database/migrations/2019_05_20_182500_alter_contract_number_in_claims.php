<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AlterContractNumberInClaims extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('claims', function (Blueprint $table) {
                $table->string('contract_number',10)->change();
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
