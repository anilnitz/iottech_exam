<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamProjectAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('exam_project_assessment_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type_name');
            $table->string('description');
            $table->string('current_date');
            $table->timestamps();
        });
        Schema::create('exam_project_assessments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assessment_types_id')->unsigned();
            $table->foreign('assessment_types_id')->references('id')->on('exam_project_assessment_types')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_description')->nullable();
            $table->string('from_project')->nullable();
            $table->string('to_project')->nullable();
            $table->string('current_date')->nullable();
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
        Schema::dropIfExists('exam_project_assessments');
    }
}
