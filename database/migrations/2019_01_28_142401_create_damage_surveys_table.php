 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDamageSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('datetime_scheduled');
            $table->unsignedInteger('claim_id');
            $table->foreign('claim_id')->references('id')->on('claims');
            $table->unsignedInteger('status_id');
            $table->foreign('status_id')->references('id')->on('claim_statuses');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        Schema::create('assistant_to_survey', function (Blueprint $table) {
            $table->primary(['assistant_assessor_id', 'survey_id']);
            $table->unsignedInteger('assistant_assessor_id');
            $table->foreign('assistant_assessor_id')->references('id')->on('users');
            $table->unsignedInteger('survey_id');
            $table->foreign('survey_id')->references('id')->on('surveys');
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
        Schema::dropIfExists('assistant_to_survey');
        Schema::dropIfExists('surveys');
    }
}
