<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('courses', function (Blueprint $table){
          $table->after('course_teacher', function ($table){
              $table->string('course_teacher_image');
              $table->float('credit_hours')->change();
              $table->string('join_code');
              $table->json('joined_students')->nullable();
              $table->string('class_link')->nullable();
              $table->string('drive_link')->nullable();
          });
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
