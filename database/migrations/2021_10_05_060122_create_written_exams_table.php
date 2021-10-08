<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWrittenExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('written_exams', function (Blueprint $table) {
          $table->id();
          $table->string('course_code');
          $table->string('course_teacher');
          $table->date('exam_date');
          $table->time('exam_start');
          $table->time('exam_end');
          $table->string('exam_topic');
          $table->integer('question_no');
          $table->string('questions');
          $table->integer('marks');
          $table->json('submitted_students')->nullable();
          $table->integer('total_students');
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
        Schema::dropIfExists('written_exams');
    }
}
