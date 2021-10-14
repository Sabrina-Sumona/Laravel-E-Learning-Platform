<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Submitted_quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $quizzes = Quiz::query()->orderBy('created_at', 'DESC')->get();

    $courseInfo= User::where('id','=', auth()->user()->id)->first();
    $courses = $courseInfo->courses;
    $courses = json_decode($courses);
    foreach ($courses as $course) {
      $cCode = substr($course, 0, strpos($course, ":"));
      $cCodes[]=$cCode;
    }
    if($courses!=null)
    {
      return view('quiz', compact('quizzes', 'cCodes'));
    }
    else
    {
      $quizzes = null;
      return view('quiz', compact('quizzes'));
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
  * @param  \App\Models\Quiz  $quiz
  * @return \Illuminate\Http\Response
  */
  public function show(Quiz $quiz)
  {
    //
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\Models\Quiz  $quiz
  * @return \Illuminate\Http\Response
  */
  public function edit(Quiz $quiz)
  {
    //
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Quiz  $quiz
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, Quiz $quiz)
  {
    //
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Quiz  $quiz
  * @return \Illuminate\Http\Response
  */
  public function destroy(Quiz $quiz)
  {
    //
  }

  public function submitQuiz(Request $request)
  {
    $cCode = $request->get('cCode');
    $topic = $request->get('topic');

    $quizInfo = Quiz::where([['course_code','=', $cCode],['quiz_topic', '=', $topic]])->first();

    $quiz_start = $quizInfo->quiz_start;
    $quiz_end = $quizInfo->quiz_end;
    $quiz_date = $quizInfo->quiz_date;

    if(date('g:i a',strtotime($quiz_start))<=date("g:i a") && date('g:i a',strtotime($quiz_end))>=date("g:i a") && date('F j, Y (D)',strtotime($quiz_date))<=date("F j, Y (D)"))
    {
      $answer = $quizInfo->answer;
      $answer = json_decode($answer);
      $mark = 0;
      for ($i=0; $i < 20; $i++) {
        $submission[] = $request->input('ans'.$i);
        if($submission[$i] == $answer[$i])
        {
          $mark++;
        }
      }
      $mark=$mark/2;
      $submitted_students = $quizInfo->submitted_students;
      $submitted_students_array = json_decode($submitted_students);

      if(in_array(auth()->user()->roll, $submitted_students_array)) {

        return redirect()->back()->with('warning', 'Submitted Already!!');

      } else {
        $quizInfo->increment('total_students');

        array_push($submitted_students_array, auth()->user()->roll);
        $submitted_students= json_encode($submitted_students_array);

        DB::table('quizzes')->where([['course_code',$cCode],['quiz_topic', $topic]])->update([
          'submitted_students'=> $submitted_students,
        ]);

        DB::table('submitted_quizzes')->insert([
          'topic' => $cCode.": ".$topic,
          'submitted_student' => auth()->user()->roll." : ".auth()->user()->name,
          'marks' => $mark,
        ]);
        return redirect()->route('quiz.index')->with('success', 'Quiz Submitted Successfully!!');
      }
    }
    else {
      return redirect()->route('quiz.index')->with('warning', 'Exam Timeout!!');
    }
  }

  public function viewQuiz(Request $request)
  {
    $topic=$request->has('topic')?$request->get('topic'):'';
    $ansInfo = Submitted_quiz::where('topic', '=', $topic)->get();
    return view('submitted_quizzes', compact('ansInfo','topic'));
  }
  public function viewQuestion(Request $request)
  {
    $cCode=$request->has('cCode')?$request->get('cCode'):'';
    $topic=$request->has('topic')?$request->get('topic'):'';

    $quizzes = Quiz::where([['course_code','=', $cCode],['quiz_topic', '=', $topic]])->first();

    $question_no = $quizzes->question_no;
    $questions_no = json_decode($question_no);

    $question = $quizzes->question;
    $questions = json_decode($question);

    $option = $quizzes->options;
    $options = json_decode($option);

    $count=0;

    $answer = $quizzes->answer;
    $answer = json_decode($answer);

    return view('quiz_ques', compact('questions','questions_no','options','topic','cCode','count','answer'));
  }
}
