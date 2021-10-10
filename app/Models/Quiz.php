<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable=[
      'course_code',
      'course_teacher',
      'quiz_date',
      'quiz_start',
      'quiz_end',
      'quiz_topic',
      'question_no',
      'questions',
      'options',
      'answers',
      'marks',
      'submitted_students',
      'total_students'
   ];
}
