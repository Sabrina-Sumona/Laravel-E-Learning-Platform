@extends('layouts.main')

@section('center')
<div class="row mt-5">
  <div class="container mt-5">
    <div class="container-fluid col-md-8">
      <table class="table table-responsive rounded border t-center">
        <tbody>
          <tr>
            <th colspan="3"><h1 align="center">Student's Evaluation</h1></th>
          </tr>
          <tr>
            <th>Examinations</th>
            @if(auth()->user()->role == 'tchr')
            <th>Students</th>
            @endif
            <th>Marks</th>
          </tr>
          @foreach(array_reverse($writtenResults) as $writtenResult)
          <tr>
            <td>{{$writtenResult->topic}}</td>
            @if(auth()->user()->role == 'tchr')
            <td>{{$writtenResult->submitted_student}}</td>
            @endif
            @if($writtenResult->marks==null)
            <td>N/A</td>
            @else
            <td>{{$writtenResult->marks}} marks</td>
            @endif
          </tr>
          @endforeach
          @foreach(array_reverse($quizResults) as $quizResult)
          <tr>
            <td>{{$quizResult->topic}}</td>
            @if(auth()->user()->role == 'tchr')
            <td>{{$quizResult->submitted_student}}</td>
            @endif
            <td>{{$quizResult->marks}} marks</td>
          </tr>
          @endforeach
          @foreach(array_reverse($assignmentResults) as $assignmentResult)
          <tr>
            <td>{{$assignmentResult->topic}}</td>
            @if(auth()->user()->role == 'tchr')
            <td>{{$assignmentResult->submitted_student}}</td>
            @endif
            @if($assignmentResult->marks==null)
            <td>N/A</td>
            @else
            <td>{{$assignmentResult->marks}} marks</td>
            @endif
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
