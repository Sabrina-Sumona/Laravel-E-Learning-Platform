<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $courses= Course::paginate(12);
    // dd($courses);
    return view('courses', compact('courses'));
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
  * @param  \App\Models\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function show(Course $course)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function edit(Course $course)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Course $course)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Course  $course
  * @return \Illuminate\Http\Response
  */
  public function destroy(Course $course)
  {
    //
  }

  public function addCourse(Request $request) {
    // dd($request);
    DB::table('courses')->insert([
      'course_code' => $request->get('course_code') ?? '',
      'course_title' => $request->get('course_title') ?? '',
      'credit_hours' => $request->get('credit_hours') ?? '',
      'course_teacher' => $request->get('course_teacher') ?? '',
      'course_teacher_image' => $request->get('course_teacher_image') ?? '',
      'join_code' => $request->get('join_code') ?? '',
    ]);

    $courseInfo= User::where('id','=', auth()->user()->id)->first();

    $cCode = $request->get('course_code');
    $cTitle = $request->get('course_title');
    $cCredit = intval($request->get('credit_hours'));

    $course = $courseInfo->courses;
    $course_array = json_decode($course);

    array_push($course_array, $cCode.": ".$cTitle." (".$cCredit." Credit)");
    $course = json_encode($course_array);

    DB::table('users')->where('id','=', auth()->user()->id)->update(['courses'=>$course]);

    $course = $courseInfo->credit_hours;
    $course_array = json_decode($course);

    array_push($course_array, $cCredit);
    $course = json_encode($course_array);

    DB::table('users')->where('id','=', auth()->user()->id)->update(['credit_hours'=>$course]);

    return back()->with('success', 'New Course Added Successfully!');
  }

  public function joinCourse(Request $request) {
    // dd($request);
    $cCode= $request->has('course_code')?$request->get('course_code'):'';
    $jCode= $request->has('join_code')?$request->get('join_code'):'';

    $joinInfo= Course::where('course_code','=', $cCode)->where('join_code', '=', $jCode)->first();

    if(isset($joinInfo) && $joinInfo!=null) {
      $jstd_id = $joinInfo->joined_students_id;
      $jstd_id_array = json_decode($jstd_id);

      $jstd_name = $joinInfo->joined_students_name;
      $jstd_name_array = json_decode($jstd_name);

      if(in_array(auth()->user()->roll, $jstd_id_array)) {

        return redirect()->back()->with('warning', 'Joined Already!!');

      } else {
        $joinInfo->increment('total_students');

        array_push($jstd_id_array, auth()->user()->roll);
        $jstd_id= json_encode($jstd_id_array);

        DB::table('courses')->where('course_code','=', $cCode)->update(['joined_students_id'=>$jstd_id]);

        array_push($jstd_name_array, auth()->user()->name);
        $jstd_name= json_encode($jstd_name_array);

        DB::table('courses')->where('course_code','=', $cCode)->update(['joined_students_name'=>$jstd_name]);

        $courseInfo= User::where('id','=', auth()->user()->id)->first();

        $cTitle = $joinInfo->course_title;
        $cCredit = $joinInfo->credit_hours;

        $course = $courseInfo->courses;
        $course_array = json_decode($course);

        array_push($course_array, $cCode.": ".$cTitle." (".$cCredit." Credit)");
        $course = json_encode($course_array);

        DB::table('users')->where('id','=', auth()->user()->id)->update(['courses'=>$course]);

        $course = $courseInfo->credit_hours;
        $course_array = json_decode($course);

        array_push($course_array, $cCredit);
        $course = json_encode($course_array);

        DB::table('users')->where('id','=', auth()->user()->id)->update(['credit_hours'=>$course]);

        return redirect()->back()->with('success', 'Joined successfully!!');
      }

    } else {
      return redirect()->back()->with('failure', 'Course Code or Join code Invalid!!');
    }
  }
}
