<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamClassTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_class_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session');
            $table->string('class_id');
            $table->string('monthFrom');
            $table->string('monthTo');
            $table->string('subject_id');
            $table->string('totalMarks');
            $table->string('passingMarks');
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
        Schema::dropIfExists('exam_class_tests');
    }
}
