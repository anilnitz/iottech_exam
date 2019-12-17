<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('term_name');
            $table->string('description');
            $table->string('current_date');
            $table->timestamps();
        });
        Schema::create('exam_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('term_id')->unsigned();
            $table->foreign('term_id')->references('id')->on('exam_terms');
            $table->string('type_name')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('exam_types');
    }
}
