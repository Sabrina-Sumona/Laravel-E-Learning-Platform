<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitted_assignment extends Model
{
    use HasFactory;

    protected $fillable=[
      'topic',
      'submitted_student',
      'assignment_file',
      'marks'
   ];
}
