<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizzes', function (Blueprint $table) {
          $table->id();
          $table->string('course_code');
          $table->string('course_teacher');
          $table->date('quiz_date');
          $table->time('quiz_start');
          $table->time('quiz_end');
          $table->string('quiz_topic');
          $table->integer('question_no');
          $table->string('question');
          $table->json('options');
          $table->string('answer');
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
        Schema::dropIfExists('quizzes');
    }
}
