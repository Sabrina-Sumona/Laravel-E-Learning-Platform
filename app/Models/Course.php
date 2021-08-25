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
          'total_std',
          'joined_students',
          'class_link',
          'drive_link',
       ];
}
