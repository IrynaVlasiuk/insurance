<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MoveValidatedToSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('claims', function (Blueprint $table) {
            $table->dropColumn('validated_at');
        });

        Schema::table('surveys', function (Blueprint $table) {
            $table->dateTime('validated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->dropColumn('validated_at');
        });

        Schema::table('claims', function (Blueprint $table) {
            $table->dateTime('validated_at')->nullable();
        });
    }
}
