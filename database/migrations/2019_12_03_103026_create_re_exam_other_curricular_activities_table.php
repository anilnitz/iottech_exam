<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReExamOtherCurricularActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('re_exam_other_curricular_activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session');
            $table->string('test_id');
            $table->string('class_id');
            $table->string('student_id');
            $table->string('activity_type');
            $table->string('obtain_marks');
            $table->string('obtain_percentage');
            $table->string('test_result');
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
        Schema::dropIfExists('re_exam_other_curricular_activities');
    }
}
