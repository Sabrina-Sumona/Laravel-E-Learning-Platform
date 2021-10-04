<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\Course;
use App\Models\User;
use App\Models\Material;
use Illuminate\Support\Facades\DB;
use App\Models\Assignment;
use App\Models\Submitted_assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    return view('examination');
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
  * @param  \App\Models\Exam  $exam
  * @return \Illuminate\Http\Response
  */
  public function show(Exam $exam)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Exam  $exam
  * @return \Illuminate\Http\Response
  */
  public function edit(Exam $exam)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Exam  $exam
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Exam $exam)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Exam  $exam
  * @return \Illuminate\Http\Response
  */
  public function destroy(Exam $exam)
  {
    //
  }

  public function addAssignment(Request $request)
  {
    $cCode= $request->has('course_code')?$request->get('course_code'):'';
    $setInfo= Course::where('course_code','=', $cCode)->first();

    if(isset($setInfo) && $setInfo!=null){
      $lecturer = DB::table('courses')->where('course_code','=', $cCode)->pluck('course_teacher');

      if($lecturer[0] == auth()->user()->name)
      {
        DB::table('assignments')->insert([
          'course_code' => $request->get('course_code') ?? '',
          'course_teacher' => $request->get('course_teacher') ?? '',
          'due_date' => $request->get('due_date') ?? '',
          'assignment_topic' => $request->get('assignment_topic') ?? '',
          'assignment_detail' => $request->get('assignment_detail') ?? '',
          'assignment_mark' => $request->get('assignment_mark') ?? ''
        ]);
        return back()->with('success', 'New Assignment Set Successfully!!');
      }

      else {
        return back()->with('failure', 'This Course is Not Added by You!!');
      }

    } else{
      return back()->with('failure', 'Invalid Course Code!!');
    }
  }
  public function giveMarks(Request $request)
  {
    $mark= $request->has('mark')?$request->get('mark'):'';
    $std= $request->has('std')?$request->get('std'):'';
    $topic= $request->has('topic')?$request->get('topic'):'';
    // dd($request);
    DB::table('submitted_assignments')->where([['submitted_student',$std],['topic', $topic]])->update([
      'marks'=> $mark,
    ]);
    return back()->with('success', 'Mark has Given Successfully!!');
  }

}
