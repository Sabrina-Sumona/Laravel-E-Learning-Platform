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
    $courses = Course::select('course_code','course_title','joined_students')->where('course_teacher','=', auth()->user()->name)->get();
    $length = 0;
    if(isset($courses) && $courses!="[]")
    {
      $length = count($courses);
      for ($i=0; $i < $length ; $i++) {
        $course_code[] = $courses[$i]->course_code;
      }
      for ($i=0; $i < $length ; $i++) {
        $course_title[] = $courses[$i]->course_title;
      }
      for ($i=0; $i<$length ; $i++) {
        $std_id = $courses[$i]->joined_students;
        $std_id = json_decode($std_id);
        $std[] = count($std_id);
        if($std_id != null)
        {
          for($j=0; $j<$std[$i] ; $j++)
          {
            $std_info = User::select(['name','roll'])->where('roll','=', $std_id[$j])->first();
            $std_roll[$i][$j] = $std_info->roll;
            $std_name[$i][$j] = $std_info->name;
          }
        }
        else {
          $std_roll[][] = null;
          $std_name[][] = null;
        }
      }

      return view('student_info', compact('course_code','course_title','length','std_roll','std_name','std'));
    }
    else {
      return view('student_info', compact('length'));
    }
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
