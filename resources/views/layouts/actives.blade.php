@php
$users= \App\Models\User::get();
$time= now()->subMinutes(2);

$active_users= \App\Models\User::where('last_login', '>=', $time)->pluck('id')->toArray();
@endphp
<div class="col-sm-4">
  <div class="actives">
    <div class="row active-heading">
      <h3 id="active-header">Active Users</h3>
    </div>
    <div class="row">
      @foreach($users as $user)
      <div class="col-sm-12 chat-user
      @if(in_array($user->id, $active_users))
      online
      @endif">
      @if($user->name==auth()->user()->name)
      <a href="{{route('profile.index')}}">
        <img src="{{asset($user->image ? $user->image : '/images/no_user.png')}}" class="pull-left header_img"/>
        &nbsp;
        {{$user->name}}
      </a>
      @else
      <form method="POST" action="{{route('student_detail')}}">
        @csrf
        <input hidden id='std' name='std' value="{{$user->roll}}">
        <button type="submit" class="active_info">
          <img src="{{asset($user->image ? $user->image : '/images/no_user.png')}}" class="pull-left header_img"/>
          &nbsp;
          {{$user->name}}
        </button>
      </form>
      @endif
    </div>
    @endforeach
  </div>
</div>
</div>
