<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamOtherCurricularActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_other_curricular_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session');
            $table->string('activity_type');
            $table->string('activity_description');
            $table->string('class_id');
            $table->string('student_id');
            $table->string('obtain_marks');
            $table->string('percentage_obtained');
            $table->string('test_result');
            $table->string('reExam_permission');
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
        Schema::dropIfExists('exam_other_curricular_activities');
    }
}
