<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $courses = DB::table('courses')->pluck('course_code');

    if(isset($courses) && $courses!=null)
    {
      $students_id = array();
      $students_name = array();
      $cCodes = array();
      $length=0;

      foreach($courses as $course)
      {
        $lecturer = DB::table('courses')->where('course_code','=', $course)->pluck('course_teacher');

        if ($lecturer[0] == auth()->user()->name) {
          $length++;

          $cCodes[] = $course;

          $joined_students_id = DB::table('courses')->where('course_code','=', $course)->pluck('joined_students_id');

          foreach($joined_students_id as $joined_student_id)
          {
            $students_id[] = $joined_student_id;
          }

          $joined_students_name = DB::table('courses')->where('course_code','=', $course)->pluck('joined_students_name');

          foreach($joined_students_name as $joined_student_name)
          {
            $students_name[] = $joined_student_name;
          }
        }
      }
      return view('student_info', compact('length','cCodes','students_id','students_name'));
    }
    return view('student_info');
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    //
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    //
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function destroy($id)
  {
    //
  }
}
