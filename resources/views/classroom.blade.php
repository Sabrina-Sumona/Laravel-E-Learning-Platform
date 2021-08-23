@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <table class="table table-responsive rounded border">
          <tbody>
            @foreach($courses as $course)
            <tr>
              <td>{{$course}}</td>
              <td>
                <a type="button" class="btn btn-primary" href="#">
                  Enter
                </a>
                <hr class="line">
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
