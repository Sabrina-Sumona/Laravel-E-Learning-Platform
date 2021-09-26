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

    @if($courses!=null)
    @foreach($courses as $course)
    <div class="container col-md-4 mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">{{$course}}</h5>
          <hr class="colors1">
          <form action="{{route('show_materials')}}" method="POST">
            @csrf
            <input value="{{$course}}" name="course" hidden>
            <button type="submit" class="btn colors2 mb-4  mt-5">Course Materials</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
    @else
    @include('layouts.no_course')
    @endif
  </div>
</div>

@if(auth()->user()->role == 'tchr')
@include('layouts.add_materials')
@endif

@endsection
