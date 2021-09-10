@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="wrapper">
      <div class="mt-1">
        <div  class="notices d-flex align-items-start justify-content-between m-2 p-3 text-light">
          <h1>Notices</h1>
        </div>
        @foreach($notices as $notice)
          <div  class="notice d-flex align-items-start justify-content-between m-2 p-3">
              <div class="d-flex flex-column"> <b class="text-justify"> {{$notice['data']}}</b>
                  <p class="text-muted" style="text-transform: capitalize;">Type: {{$notice['type']}}</p>
              </div>
              <div class="ml-md-4 ml-0"> <a class="fas fa-arrow-right btn" href="{{route('tasks')}}"></a> </div>
          </div>
          @endforeach
      </div>
  </div>
</div>
@endsection
