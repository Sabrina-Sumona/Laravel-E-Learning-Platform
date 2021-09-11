@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="wrapper">
      <div class="mt-1">
        <div  class="notices d-flex align-items-start justify-content-between m-2 p-3 text-light">
          <h1>Notices</h1>
        </div>
        @foreach(array_reverse($notices) as $notice)
          <div  class="notice d-flex align-items-start justify-content-between m-2 p-3">
              <img src="{{asset($notice['owner_image']?$notice['owner_image']:'/images/no_user.png')}}" alt="user" class="m-2">
              <div class="d-flex flex-column"> <b class="text-justify"> {{$notice['data']}}</b>
                  {{date('d.m.Y, g:i a', strtotime($notice['created_at']))}}
              </div>
              <div class="ml-md-4 ml-0"> <a class="fas fa-arrow-right btn" href="{{route('tasks')}}"></a> </div>
          </div>
          @endforeach
      </div>
  </div>
</div>
@endsection
