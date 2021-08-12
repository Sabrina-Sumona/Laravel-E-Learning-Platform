@extends('layouts.main')

@section('center')
<div class="container mt-5">
  @if(session()->has('success'))
  <div class="alert alert-success mt-5" style="text-align: center;">
    {{ session()->get('success') }}
  </div>
  @endif
    <div class="d-flex align-items-center cards">
      @foreach($courses as $course)
        <div class="card">
            <div class="mb-3"><span class="light-grey fs-6">{{$course->course_code}}</span> </div>
            <div class="h5"> <a href="/course_details">{{$course->course_title}}</a> </div>
            <div class="mt-auto">
                <div class="d-flex align-items-center">
                    <div class="profile"> <img src="{{asset($course->course_teacher_image)?? '/images/no_user.jpg'}}" class="profile-picture pull-left"/>
                    &nbsp; </div>
                    <div class="ms-2">
                        <div class="light-grey fs-6">Lecturer</div>
                        <div class="text-grey fs-5">{{$course->course_teacher}}</div>
                    </div>
                </div>
            </div>
        </div>
      @endforeach
    </div>
    @if(auth()->user()->role == 'tchr')
      @include('add_course')
    @endif
</div>
@endsection
@push('scripts')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endpush
