@extends('layouts.main')

@section('center')
<div class="container mt-5">
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
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <table class="table table-responsive rounded border">
          <tbody>
            @foreach($courses as $course)
            <tr>
              <td>{{$course}}</td>
              <td>
                <form action="{{route('enter_class')}}" method="POST" target="_blank">
                    @csrf
                    <input value="{{$course}}" name="course" hidden>
                    <button type="submit" class="btn btn-success">Enter</button>
                </form>
              </td>
              @if(auth()->user()->role == 'tchr')
              <td>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#setModal">
                  Set
                </button>
                <hr class="line">
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  @else
  @include('layouts.no_course')
  @endif
</div>
<div class="modal fade" id="setModal" tabindex="-1" aria-labelledby="setModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CLass Join Link</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <form action="{{route('set_class')}}" method="POST">
        <div class="modal-body">
          @csrf
          <div class="row">
            <div class="col-sm-4">
              <h5><label id="course_code" class="pull-right">Course code</label></h5>
            </div>
            <div class="col-sm-8">
              <input class="form-group" type="text" value="" id="course_code" name="course_code" required>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4">
              <h5><label id="class_link" class="pull-right">Zoom Link</label></h5>
            </div>
            <div class="col-sm-8">
              <input class="form-group" type="text" value="" id="class_link" name="class_link" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Set</button>
        </div>
      </form>
    </div>
  </div>
  @endsection

  @push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  @endpush
