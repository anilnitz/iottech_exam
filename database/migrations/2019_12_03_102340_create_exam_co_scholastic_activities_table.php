<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamCoScholasticActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_co_scholastic_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject_id');
            $table->string('class_id');
            $table->string('activity_type');
            $table->string('description_activity');
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
        Schema::dropIfExists('exam_co_scholastic_activities');
    }
}
