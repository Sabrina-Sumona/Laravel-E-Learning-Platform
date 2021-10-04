<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable=[
      'course_code',
      'course_teacher',
      'due_date',
      'assignment_topic',
      'assignment_detail',
      'assignment_mark',
      'submitted_students',
      'total_students'
   ];
}
