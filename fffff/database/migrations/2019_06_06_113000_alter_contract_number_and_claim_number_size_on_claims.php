<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class AlterContractNumberAndClaimNumberSizeOnClaims extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::table('claims', function (Blueprint $table) {
                $table->string('external_id',25)->change();
                $table->string('contract_number',25)->change();
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
