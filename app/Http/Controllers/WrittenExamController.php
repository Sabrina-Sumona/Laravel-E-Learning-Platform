<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\submitted_answer;
use App\Models\Written_exam;
use Illuminate\Http\Request;

class WrittenExamController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $exams = Written_exam::query()->orderBy('created_at', 'DESC')->get();

    $courseInfo= User::where('id','=', auth()->user()->id)->first();
    $courses = $courseInfo->courses;
    $courses = json_decode($courses);
    foreach ($courses as $course) {
      $cCode = substr($course, 0, strpos($course, ":"));
      $cCodes[]=$cCode;
    }
    if($courses!=null)
    {
      return view('written', compact('exams', 'cCodes'));
    }
    else
    {
      $exams = null;
      return view('written', compact('exams'));
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
  * @param  \App\Models\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function show(Assignment $assignment)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function edit(Assignment $assignment)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Assignment $assignment)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Assignment  $assignment
  * @return \Illuminate\Http\Response
  */
  public function destroy(Assignment $assignment)
  {
    //
  }

  public function submitAnswers(Request $request)
  {
    $exam_start = $request->get('exam_start');
    $exam_end = $request->get('exam_end');
    $exam_date = $request->get('exam_date');
    if(date('g:i a',strtotime($exam_start))<=date("g:i a") && date('g:i a',strtotime($exam_end))>=date("g:i a") && date('F j, Y (D)',strtotime($exam_date))<=date("F j, Y (D)"))
    {
      $request->validate([
        'file' => 'required|mimes:pdf,doc,jpg,png,jpeg,txt|max:10000',
      ]);

      if($request->hasFile('file')){
        $cCode=$request->has('cCode')?$request->get('cCode'):'';
        $topic=$request->has('topic')?$request->get('topic'):'';

        $file=$request->file('file');
        $extension=$file->getClientOriginalExtension();
        $fileName=$cCode.' '.$topic.'.'.$extension;
        $location='/files/'.Auth::user()->name. '/';

        $file->move(public_path().$location, $fileName);
        $exam_file=$location.$fileName;

        $examInfo= Written_exam::where([['course_code','=', $cCode],['exam_topic', '=', $topic]])->first();

        if(isset($examInfo) && $examInfo!=null) {
          $submitted_students = $examInfo->submitted_students;
          $submitted_students_array = json_decode($submitted_students);
          if(in_array(auth()->user()->roll, $submitted_students_array)) {

            return redirect()->back()->with('warning', 'Submitted Already!!');

          } else {
            $examInfo->increment('total_students');
            array_push($submitted_students_array, auth()->user()->roll);
            $submitted_students= json_encode($submitted_students_array);

            DB::table('Written_exams')->where([['course_code',$cCode],['exam_topic', $topic]])->update([
              'submitted_students'=> $submitted_students,
            ]);

            DB::table('submitted_answers')->insert([
              'topic' => $cCode.": ".$topic,
              'submitted_student' => auth()->user()->roll." : ".auth()->user()->name,
              'ans_file' => $exam_file,
            ]);
            return back()->with('success', 'Answer Submitted Successfully!!');
          }
        }
      }
      return back()->with('failure', 'Invalid file type!!');
    }
    else {
      return back()->with('warning', 'Exam Timeout!!');
    }
  }

  public function viewAnswer(Request $request)
  {
    $topic=$request->has('topic')?$request->get('topic'):'';
    $ansInfo = submitted_answer::where('topic', '=', $topic)->get();
    return view('submitted_answers', compact('ansInfo','topic'));
  }

}
