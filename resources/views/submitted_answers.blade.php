@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if(session()->has('success'))
    <div class="alert alert-success mt-5" style="text-align: center;">
      {{ session()->get('success') }}
    </div>
    @endif
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-10 mx-auto">
          <table class="table table-responsive rounded border t-center p-4">
            <tbody>
              <th colspan="4">
                <h4 align="center">
                  <strong>
                    Submissions of {{$topic}}
                  </strong>
                </h4>
              </th>
              @if($ansInfo->isNotEmpty())
              <tr class="table-headings">
                <th>Submitted Student</th>
                <th>Submission Time</th>
                <th>Marks</th>
                <th></th>
              </tr>
              @foreach($ansInfo as $ans)
              <tr>
                <td>
                  <a class="std_info" href="{{$ans->ans_file}}">{{$ans->submitted_student}}</a>
                </td>
                <td>{{date('F j, Y (D), g:i a', strtotime($ans->created_at))}}</td>
                @if($ans->marks==null)
                <td>Not given</td>
                @else
                <td>{{$ans->marks}}</td>
                @endif
                <td>
                  <form action="{{route('give_marks')}}" method="POST">
                    @csrf
                    <input type="number" step="0.1" name="mark" style="width:110px; height:40px;" placeholder="Give marks" required>
                    <input value="{{$ans->topic}}" name="topic" hidden>
                    <input value="{{$ans->submitted_student}}" name="std" hidden>
                    <button type="submit" class="btn btn-success m-2" >OK</button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td align='center'>No Student Have Submitted Yet!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
