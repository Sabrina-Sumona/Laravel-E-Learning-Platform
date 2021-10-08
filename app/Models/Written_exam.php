<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Written_exam extends Model
{
    use HasFactory;

    protected $fillable=[
      'course_code',
      'course_teacher',
      'exam_date',
      'exam_start',
      'exam_end',
      'exam_topic',
      'questions',
      'question_no',
      'marks',
      'submitted_students',
      'total_students'
   ];
}
