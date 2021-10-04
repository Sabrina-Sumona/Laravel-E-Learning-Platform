@extends('layouts.main')

@section('center')
<div class="row mt-5">
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
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Assignment</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('assignment.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Quiz</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('assignment.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Written</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('assignment.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>

@if(auth()->user()->role == 'tchr')
@include('layouts.add_assignments')
@endif
@endsection
