@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
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
        <div class="col-md-6 mx-auto">
          <table class="table table-responsive rounded border t-center">
            <tbody>
              <th colspan="2"><h4 align="center"><strong>Course Materials of {{$cCode}}</strong></h4></th>
              @if($materials->isNotEmpty())
              @foreach($materials as $material)
              <tr>
                <td align='center'>{{date('d-m-Y (D)',strtotime($material->class_date))}}</td>
                <td align='center'>
                  <form action="{{route('view_materials')}}" method="POST" target="_blank">
                    @csrf
                    <input value="{{$cCode}}" name="course" hidden>
                    <input value="{{$material->class_date}}" name="date" hidden>
                    <button type="submit" class="btn btn-success" >View</button>
                  </form>
                </td>
              </tr>
              @endforeach
              @else
              <tr>
                <td>Materials Not Given Yet!
                  @if(auth()->user()->role == 'tchr')
                  Please add the materials of this course.
                  @endif
                </td>
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
