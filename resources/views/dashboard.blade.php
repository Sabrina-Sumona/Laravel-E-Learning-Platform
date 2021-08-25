@extends('layouts.main')

@section('center')
<div class="row">
  @foreach($courses as $course)
  <div class="container col-md-4 mt-5">
    <div class="container mt-5">
      <div class="category mb-30">
        <div class="box">
          <h5 class="colors1 mt-5 mb-2">{{$course}}</h5>
          <hr class="colors1">
          <span class="colors2 mb-4  mt-5"><a href="#">Course Materials</a></span>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
@include('layouts.user_info')
@endsection
