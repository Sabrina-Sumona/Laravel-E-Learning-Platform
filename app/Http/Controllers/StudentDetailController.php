<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StudentDetailController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    //
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

  public function showDetail(Request $request)
  {
    $std = $request->get('std');
    $std_info = User::select(['image','name','roll','mobile','email','created_at','courses','credit_hours','role'])->where('roll','=', $std)->first();

    if(isset($std_info) && $std_info!=null) {
      $std_role = $std_info->role;
      $std_courses = $std_info->courses;
      $std_credits = $std_info->credit_hours;

      $std_courses = json_decode($std_courses);
      $std_credits = json_decode($std_credits);

      $Total_credits = 0.0;
      $length = 0;

      if($std_credits!=null)
      {
        foreach($std_credits as $std_credit)
        {
          $Total_credits = $Total_credits + $std_credit;
          $length++;
        }
      }

      $std = $std_info->roll.' : '.$std_info->name;

      $assignmentResults = DB::select("SELECT  `topic`,`submitted_student`,`marks` FROM `Submitted_assignments`   WHERE `submitted_student` = '$std'");

      $quizResults = DB::select("SELECT  `topic`,`marks` FROM `Submitted_quizzes`   WHERE `submitted_student` = '$std'");

      $writtenResults = DB::select("SELECT  `topic`,`marks` FROM `Submitted_answers`   WHERE `submitted_student` = '$std'");

      return view('student_detail', compact('std_info','std_role','std_courses','std_credits','Total_credits','length','assignmentResults','quizResults','writtenResults'));
    } else {
      return redirect()->back()->with('warning', 'Sorry! Student Not Found.');
    }
  }
}
