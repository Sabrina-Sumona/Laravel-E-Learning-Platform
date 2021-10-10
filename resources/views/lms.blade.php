@extends('layouts.main')

@section('center')
<div class="row mt-5">
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Classroom</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('classroom.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Exams</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('examination.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">Result</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5">
            <a href="{{route('result.index')}}">View Details</a>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
