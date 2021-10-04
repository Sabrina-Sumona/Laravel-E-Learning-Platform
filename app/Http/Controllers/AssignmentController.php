<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Submitted_assignment;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $assignments = Assignment::query()->orderBy('created_at', 'DESC')->get();

      $courseInfo= User::where('id','=', auth()->user()->id)->first();
      $courses = $courseInfo->courses;
      $courses = json_decode($courses);
      foreach ($courses as $course) {
        $cCode = substr($course, 0, strpos($course, ":"));
        $cCodes[]=$cCode;
      }
      // dd($cCodes);
      if($courses!=null)
      {
        return view('assignment', compact('assignments', 'cCodes'));
      }
      else
      {
        $assignments = null;
        return view('assignment', compact('assignments'));
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

    public function submitAssignment(Request $request)
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
        $assignment_file=$location.$fileName;

        $assignmentInfo= Assignment::where([['course_code','=', $cCode],['assignment_topic', '=', $topic]])->first();
        // dd($assignmentInfo);

        if(isset($assignmentInfo) && $assignmentInfo!=null) {
          $submitted_students = $assignmentInfo->submitted_students;
          $submitted_students_array = json_decode($submitted_students);
          // dd($submitted_students);
          if(in_array(auth()->user()->roll, $submitted_students_array)) {

            return redirect()->back()->with('warning', 'Submitted Already!!');

          } else {
            $assignmentInfo->increment('total_students');
            // dd($submitted_students_array);
            array_push($submitted_students_array, auth()->user()->roll);
            $submitted_students= json_encode($submitted_students_array);

            DB::table('assignments')->where([['course_code',$cCode],['assignment_topic', $topic]])->update([
              'submitted_students'=> $submitted_students,
            ]);

            DB::table('submitted_assignments')->insert([
              'topic' => $cCode.": ".$topic,
              'submitted_student' => auth()->user()->roll." : ".auth()->user()->name,
              'assignment_file' => $assignment_file,
            ]);
            return back()->with('success', 'Assignment Submitted Successfully!!');
          }
        }
      }
        return back()->with('failure', 'Invalid file type!!');
    }

    public function viewAssignment(Request $request)
    {
      // return redirect('/files/user_18/CSE 113 HW 01.pdf');
      // dd($request);
      $topic=$request->has('topic')?$request->get('topic'):'';
      $assignmentInfo = Submitted_assignment::where('topic', '=', $topic)->get();
      // dd($assignmentInfo);
      return view('submitted_assignments', compact('assignmentInfo','topic'));
    }

}
