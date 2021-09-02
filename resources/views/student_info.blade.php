@extends('layouts.main')

@section('center')
<div class="container mt-5">
  @if(session()->has('warning'))
  <div class="alert alert-warning mt-5" style="text-align: center;">
    {{ session()->get('warning') }}
  </div>
  @endif
  <div class="row">
    @include('layouts.student_search')
    @if($length!=0)
    <div class="container col-md-8">
      <div class="row">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr class="table-headings">
              <th>Course Codes & Course Titles</th>
              <th>Students ID & Name</th>
            </tr>
            @for($index=0; $index<$length; $index++)
            <tr>
              <td>
                <h5>
                  {{$course_code[$index]}} :                   {{$course_title[$index]}}
                </h5>
              </td>
              @if($std[$index]!=0)
              <td align="left">
                <h6>
                  @for($j=0; $j<$std[$index] ; $j++)
                  <form method="POST" action="{{route('student_detail')}}">
                    @csrf
                    <div class="form-group">
                      <input hidden id='std' name='std' value="{{$std_roll[$index][$j]}}">
                    </div>
                    <button type="submit" class="std_info">{{$std_roll[$index][$j]}} : {{$std_name[$index][$j]}}</button>
                  </form>
                  <br>
                  @endfor
                </h6>
              </td>
              @else
              <td>
                No Student have Joined Yet.
              </td>
              @endif
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
    @else
    @include('layouts.no_course')
    @endif
  </div>
</div>
@endsection
