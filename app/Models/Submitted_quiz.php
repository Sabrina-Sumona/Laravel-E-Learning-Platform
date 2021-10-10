<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submitted_quiz extends Model
{
    use HasFactory;

    protected $fillable=[
      'topic',
      'submitted_student',
      'marks'
   ];
}
