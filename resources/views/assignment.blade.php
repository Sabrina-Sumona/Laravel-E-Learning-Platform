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
        @if($assignments!=null)
          <table class="table table-responsive rounded border t-center p-4">
            <tbody>
              <th colspan="5">
                <h4 align="center">
                  <strong>
                    Assignments & HomeWorks
                  </strong>
                </h4>
              </th>
              <tr class="table-headings">
                <th>Course code</th>
                <th>Topics</th>
                <th>Due Dates</th>
                <th>Marks</th>
                <th>Submissions</th>
              </tr>
              @foreach($assignments as $assignment)
              @if(in_array($assignment->course_code,$cCodes))
              <tr>
                <td>{{$assignment->course_code}}</td>
                <td align='left'><strong>{{$assignment->assignment_topic}}</strong>: <br>{{$assignment->assignment_detail}}</td>
                <td>{{date('F j, Y (D)',strtotime($assignment->due_date))}}</td>
                <td>{{$assignment->assignment_mark}} marks</td>
                  @if(auth()->user()->role == 'tchr')
                  <td>
                    <form action="{{route('viewAssignment')}}" method="get">
                      @csrf
                      <input value="{{$assignment->course_code}}: {{$assignment->assignment_topic}}" name="topic" hidden>
                      <button type="submit" class="btn btn-success" >View</button>
                    </form>
                  </td>
                  @elseif(auth()->user()->role == 'std')
                  <td>
                    <form action="{{route('submitAssignment')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <input value="{{$assignment->course_code}}" name="cCode" hidden>
                      <input value="{{$assignment->assignment_topic}}" name="topic" hidden>
                      <input name="file" id="file" class="form-control" type="file"/>
                      <button type="submit" class="btn btn-success m-2" >Submit</button>
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

@endsection
