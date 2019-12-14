<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamUnitTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_unit_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session');
            $table->string('class_id');
            $table->string('month_from');
            $table->string('month_to');
            $table->string('subject_id');
            $table->string('total_marks');
            $table->string('passing_marks');
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
        Schema::dropIfExists('exam_unit_tests');
    }
}
