<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


        protected $fillable=[
          'course_code',
          'course_title',
          'credit_hours',
          'course_teacher',
          'course_teacher_image',
          'join_code',
          'joined_students',
          'total_std',
          'class_link',
          'drive_link',
       ];
}
