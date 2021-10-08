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
          @if($exams!=null)
          <table class="table table-responsive rounded border t-center p-4">
            <tbody>
              <th colspan="6">
                <h4 align="center">
                  <strong>
                    Written Examinations
                  </strong>
                </h4>
              </th>
              <tr class="table-headings">
                <th>Course code</th>
                <th>Topics</th>
                <th>Exam Dates</th>
                <th>Exam Duration</th>
                <th>Marks</th>
                <th>Submissions</th>
              </tr>
              @foreach($exams as $exam)
              @if(in_array($exam->course_code,$cCodes))
              <tr>
                <td>{{$exam->course_code}}</td>
                <td align='left'><strong>{{$exam->exam_topic}} </strong>
                  @if(auth()->user()->role == 'tchr')
                  <br>
                  <a class="std_info" href="{{$exam->questions}}">View question</a>
                  @elseif(auth()->user()->role == 'std')
                  @if(date('g:i a',strtotime($exam->exam_start))<=date("g:i a") && date('g:i a',strtotime($exam->exam_end))>=date("g:i a") && date('F j, Y (D)',strtotime($exam->exam_date))<=date("F j, Y (D)"))
                  <br>
                  <a class="std_info" href="{{$exam->questions}}">View question</a>
                  @endif
                  @endif
                </td>
                <td>{{date('F j, Y (D)',strtotime($exam->exam_date))}}</td>
                <td>{{date('g:i a',strtotime($exam->exam_start))}} - {{date('g:i a',strtotime($exam->exam_end))}}</td>
                <td>{{$exam->marks}} marks</td>
                @if(auth()->user()->role == 'tchr')
                <td>
                  <form action="{{route('viewAnswer')}}" method="get">
                    @csrf
                    <input value="{{$exam->course_code}}: {{$exam->exam_topic}}" name="topic" hidden>
                    <button type="submit" class="btn btn-success" >View</button>
                  </form>
                </td>
                @elseif(auth()->user()->role == 'std')
                <td>
                  @if(date('g:i a',strtotime($exam->exam_start))<=date("g:i a") && date('g:i a',strtotime($exam->exam_end))>=date("g:i a") && date('F j, Y (D)',strtotime($exam->exam_date))<=date("F j, Y (D)"))
                  <form action="{{route('submitAnswer')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input value="{{$exam->course_code}}" name="cCode" hidden>
                    <input value="{{$exam->exam_topic}}" name="topic" hidden>
                    <input name="file" id="file" class="form-control" type="file"/>
                    <input name="exam_start" value="{{$exam->exam_start}}" hidden>
                    <input name="exam_end" value="{{$exam->exam_end}}" hidden>
                    <input name="exam_date" value="{{$exam->exam_date}}" hidden>
                    <button type="submit" class="btn btn-success m-2"
                    >Submit</button>
                  </form>
                  @else
                  N/A
                  @endif
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
@include('layouts.add_questions')
@endif
@endsection
