<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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

    if(auth()->user()->role == 'std')
    {
      $credit_hours = $courseInfo->credit_hours;
      $credit_hours = json_decode($credit_hours);

      $Total_credits = 0.0;
      foreach($credit_hours as $credit_hour)
      {
        $Total_credits = $Total_credits + $credit_hour;
      }

      return view('dashboard', compact('courses', 'Total_credits'));
    }
    else{

      return view('dashboard', compact('courses'));
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
    // return 'welcome';
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

  public function addMaterials(Request $request) {
    $cCode= $request->has('course_code')?$request->get('course_code'):'';
    $link= $request->has('drive_link')?$request->get('drive_link'):'';

    $setInfo= Course::where('course_code','=', $cCode)->first();

    if(isset($setInfo) && $setInfo!=null && isset($link) && $link!=null) {
      DB::table('courses')->where('course_code','=', $cCode)->update(['drive_link'=>$link]);

      return back()->with('success', 'Course Materials Link Set Successfully!!');
    } else{
      return back()->with('failure', 'Course Code or Drive Link Invalid!!');
    }
  }
}
