<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $courseInfo= User::where('id','=', auth()->user()->id)->first();

    $courses = $courseInfo->courses;
    $courses = json_decode($courses);

    if(auth()->user()->role == 'std' &&   $courses!=null)
    {
      $credit_hours = $courseInfo->credit_hours;
      $credit_hours = json_decode($credit_hours);

      $Total_credits = 0.0;
      foreach($credit_hours as $credit_hour)
      {
        $Total_credits = $Total_credits + $credit_hour;
      }

      return view('classroom', compact('courses', 'Total_credits'));
    }
    else{

      return view('classroom', compact('courses'));
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
  * @param  \App\Models\Classroom  $classroom
  * @return \Illuminate\Http\Response
  */
  public function show(Classroom $classroom)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Classroom  $classroom
  * @return \Illuminate\Http\Response
  */
  public function edit(Classroom $classroom)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Classroom  $classroom
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Classroom $classroom)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Classroom  $classroom
  * @return \Illuminate\Http\Response
  */
  public function destroy(Classroom $classroom)
  {
    //
  }

  public function setClass(Request $request) {
    $cCode= $request->has('course_code')?$request->get('course_code'):'';
    $link= $request->has('class_link')?$request->get('class_link'):'';

    $setInfo= Course::where('course_code','=', $cCode)->first();

    if(isset($setInfo) && $setInfo!=null && isset($link) && $link!=null) {
      DB::table('courses')->where('course_code','=', $cCode)->update(['class_link'=>$link]);

      return back()->with('success', 'Class Link Set Successfully!!');
    } else{
      return back()->with('failure', 'Course Code or Class Link Invalid!!');
    }
  }

  public function enterClass(Request $request) {
    $course = $request->get('course');
    $cCode = substr($course, 0, strpos($course, ":"));

    $enterInfo= Course::where('course_code','=', $cCode)->first();
    if(isset($enterInfo) && $enterInfo!=null) {
      $link = DB::table('courses')->where('course_code','=', $cCode)->pluck('class_link');
      if ($link[0]!=null) {
        return redirect($link[0]);
      } else{
        return back()->with('warning', 'Class Link Not Given Yet!');
      }
    }
  }
}
