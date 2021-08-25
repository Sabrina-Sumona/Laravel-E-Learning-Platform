@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if(session()->has('success'))
    <div class="alert alert-success mt-5" style="text-align: center;">
      {{ session()->get('success') }}
    </div>
    @elseif(session()->has('failure'))
    <div class="alert alert-danger mt-5" style="text-align: center;">
      {{ session()->get('failure') }}
    </div>
    @endif
    @foreach($courses as $course)
    <div class="container col-md-4 mt-5">
        <div class="category mb-30">
          <div class="box">
            <h5 class="colors1 mt-5 mb-2">{{$course}}</h5>
            <hr class="colors1">
            <span class="colors2 mb-4  mt-5"><a href="#">Course Materials</a></span>
          </div>
        </div>
    </div>
    @endforeach
  </div>
</div>

@if(auth()->user()->role == 'tchr')
@include('layouts.add_materials')
@endif
@include('layouts.user_info')
@endsection
