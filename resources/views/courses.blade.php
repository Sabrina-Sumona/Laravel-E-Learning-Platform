@extends('layouts.main')

@section('center')
<div class="container mt-4">
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
  <div class="d-flex align-items-center cards">
    @foreach($courses as $course)
    <div class="card">
      <div class="mb-3"><span class="light-grey fs-5">{{$course->course_code}}</span> </div>
      <div class="h5 white">{{$course->course_title}}</div>
      @if(auth()->user()->role == 'std')
      <div class="d-flex justify-content-center mt-5">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinModal"> Join
        </button>
      </div>
      @endif
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
    <div class"pagination">
      {{$courses->links('vendor.pagination.bootstrap-4')}}
    </div>
    <div class="modal fade" id="joinModal" tabindex="-1" aria-labelledby="joinModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Course Join</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>
            <form action="{{route('join_course')}}" method="POST">
              <div class="modal-body">
                @csrf
                <div class="row">
                  <div class="col-sm-4">
                    <h5><label id="join_code" class="pull-right">Course code</label></h5>
                  </div>
                  <div class="col-sm-8">
                    <input class="form-group" type="text" value="" id="course_code" name="course_code" required>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <h5><label id="join_code" class="pull-right">Join code</label></h5>
                  </div>
                  <div class="col-sm-8">
                    <input class="form-group" type="text" value="" id="join_code" name="join_code" required>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Join</button>
              </div>
            </form>
        </div>
    </div>
</div>
    @if(auth()->user()->role == 'tchr')
      @include('add_course')
    @endif
  </div>
  @endsection

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  @endpush
