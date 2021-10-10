@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger mt-5" align='center'>{{ $error }}</div>
    @endforeach
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success mt-5" style="text-align: center;">
      {{ session()->get('success') }}
    </div>
    @elseif(session()->has('warning'))
    <div class="alert alert-warning mt-5" style="text-align: center;">
      {{ session()->get('warning') }}
    </div>
    @elseif(session()->has('failure'))
    <div class="alert alert-danger mt-5" style="text-align: center;">
      {{ session()->get('failure') }}
    </div>
    @endif
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-12 mx-auto">
          @if($quizzes!=null)
          <table class="table table-responsive rounded border t-center p-4">
            <tbody>
              <th colspan="6">
                <h4 align="center">
                  <strong>
                    Quizzes & MCQs
                  </strong>
                </h4>
              </th>
              <tr class="table-headings">
                <th>Course code</th>
                <th>Topics</th>
                <th>Questions</th>
                <th>Quiz Dates</th>
                @if(auth()->user()->role == 'tchr')
                <th>Submissions</th>
                @endif
              </tr>
              @foreach($quizzes as $quiz)
              @if(in_array($quiz->course_code,$cCodes))
              <tr>
                <td>{{$quiz->course_code}}</td>
                <td><strong>{{$quiz->quiz_topic}}</strong><br>{{$quiz->marks}} marks</td>
                <td>
                  @if(auth()->user()->role == 'tchr')
                  <form action="{{route('viewQues')}}" method="get">
                    @csrf
                    <input value="{{$quiz->course_code}}" name="cCode" hidden>
                    <input value="{{$quiz->quiz_topic}}" name="topic" hidden>
                    <button type="submit" class="btn btn-primary" >View</button>
                  </form>
                  @elseif(auth()->user()->role == 'std')
                  @if(date('g:i a',strtotime($quiz->quiz_start))<=date("g:i a") && date('g:i a',strtotime($quiz->quiz_end))>=date("g:i a") && date('F j, Y (D)',strtotime($quiz->quiz_date))<=date("F j, Y (D)"))
                  <form action="{{route('viewQues')}}" method="get">
                    @csrf
                    <input value="{{$quiz->course_code}}" name="cCode" hidden>
                    <input value="{{$quiz->quiz_topic}}" name="topic" hidden>
                    <button type="submit" class="btn btn-primary" >View</button>
                  </form>
                  @endif
                  @endif
                </td>
                <td>{{date('F j, Y (D)',strtotime($quiz->quiz_date))}}
                  <br>
                {{date('g:i a',strtotime($quiz->quiz_start))}} - {{date('g:i a',strtotime($quiz->quiz_end))}}</td>
                @if(auth()->user()->role == 'tchr')
                <td>
                  <form action="{{route('viewQuiz')}}" method="get">
                    @csrf
                    <input value="{{$quiz->course_code}}: {{$quiz->quiz_topic}}" name="topic" hidden>
                    <button type="submit" class="btn btn-success" >View</button>
                  </form>
                </td>
                @endif
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
          @else
          @include('layouts.no_course')
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@if(auth()->user()->role == 'tchr')
@include('layouts.add_quizzes')
@endif
@endsection
