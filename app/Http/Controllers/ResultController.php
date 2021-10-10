<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\User;
use App\Models\Submitted_assignment;
use App\Models\Submitted_answer;
use App\Models\Submitted_quiz;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(auth()->user()->role == 'tchr'){
        $assignmentResults = DB::select("SELECT  `topic`,`submitted_student`,`marks` FROM `Submitted_assignments`");

        $quizResults = DB::select("SELECT  `topic`,`submitted_student`,`marks` FROM `Submitted_quizzes`");

        $writtenResults = DB::select("SELECT  `topic`,`submitted_student`,`marks` FROM `Submitted_answers`");
        // dd($assignmentResults[2]->topic);
      }
      elseif(auth()->user()->role == 'std'){
        $user = auth()->user()->roll.' : '.auth()->user()->name;
        $assignmentResults = DB::select("SELECT  `topic`,`submitted_student`,`marks` FROM `Submitted_assignments`   WHERE `submitted_student` = '$user'");

        $quizResults = DB::select("SELECT  `topic`,`marks` FROM `Submitted_quizzes`   WHERE `submitted_student` = '$user'");

        $writtenResults = DB::select("SELECT  `topic`,`marks` FROM `Submitted_answers`   WHERE `submitted_student` = '$user'");
      }
      return view('result', compact('assignmentResults','quizResults','writtenResults'));
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
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(Result $result)
    {
        //
    }
}
