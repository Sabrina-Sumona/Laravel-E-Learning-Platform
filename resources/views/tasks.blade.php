@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="post col-sm-12" id="new_post">
          <div class="row post-heading">
            <div class="col-sm-12">
              <h4 id="post-header">Create New Post</h4><br/>
            </div>
          </div>
          <div class="row task-post" style="padding: 10px;">
            <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <textarea class="post-write" name="status" placeholder="Assign new task.." maxlength="2048" required></textarea>

                @if($errors->has('status'))
                <div class="alert alert-danger">
                  {{$errors->first('status')}}
                </div>
                @endif
              </div>
              <br>

              <div class="form-group">
                <div class="pull-left">
                  <label class="btn btn-success"><input name="image" type="file" style="display: none;"/>Add Image</label>
                  @if($errors->has('image'))
                  <div class="alert alert-danger">
                    {{$errors->first('image')}}
                  </div>
                  @endif
                </div>
                <div class="pull-right">
                  <button class="btn btn-primary">POST</button>
                </div>
                <br>
              </div>
            </form>
          </div>
        </div>
        @foreach(array_reverse($posts) as $post)
        <div class="post col-sm-12" id="post_{{$post['id']}}">
          <div class="row post-heading">
            <div class="col-sm-12 post-user">
              <a href="{{route('profile.index')}}">
                <img src="{{asset($post['user']->image)?? '/images/no_user.jpg'}}" class="header_img pull-left"/>
                &nbsp;
                <span class="post-user-name">{{$post['user']->name}}</span><br/>
                &nbsp;
                <small class="post-date">{{$post['created_at']}}</small>
              </a>
            </div>
          </div>
          <div class="row post-body">
            <div class="col-sm-12 post-status">
              {{$post['status']}}
            </div>
            @if($post['photo']!=null)
            <div class="col-sm-12" align="center">
              <img src="{{$post['photo']}}" height="220" width="220">
            </div>
            @endif
          </div>
          <div class="row post-action">
            <ul class="post-action-menu">
              <li class="pull-left"><a href="javascript:void(0);" class="text-mute" onclick="like({{$post['id']}});">Like</a></li>
              <li class="pull-left"><a href="javascript:void(0);" class="text-mute" onclick="comment({{$post['id']}});">Comment</a></li>
              <li class="pull-right"><a href="#" class="text-mute"><span id="post_comment_count_{{$post['id']}}">{{$post['comments']}}</span> Comments</a></li>
              <li class="pull-right"><a href="#" class="text-mute"><span id="post_like_count_{{$post['id']}}">{{$post['likes']}}</span> Likes</a></li>
            </ul>
          </div>
          <div class="post-comment" id="post_comment_{{$post['id']}}" style="display: none;">
            @php
            $all_comments= \App\Models\Comment::where('post_id', $post['id'])->orderBy('id')->get();
            @endphp

            @foreach($all_comments as $comm)
            @php
            $user= \App\Models\User::where('id', $comm->user_id)->first();
            @endphp
            <div class="row">
              <div class="col-sm-1">
                @if($user->name!=auth()->user()->name)
                <form method="POST" action="{{route('student_detail')}}">
                  @csrf
                  <input hidden id='std' name='std' value="{{$user->roll}}">
                  <button type="submit" class="header_img pull-left m-1 std_info">
                    <img src="{{asset($user->image ? $user->image : '/images/no_user.png')}}" class="profile-picture-small pull-left"/>
                  </button>
                </form>
                @else
                <a class="header_img pull-left m-1" href="{{route('profile.index')}}">
                  <img src="{{asset($user->image ? $user->image : '/images/no_user.png')}}" class="profile-picture-small pull-left"/>
                </a>
                @endif
              </div>

              <div class="col-sm-11">
                <span class="post-user-name">{{$user->name}}</span>
                {{$comm->comment}}
              </div>
            </div>
            @endforeach

            <div class="row">
              <form action="{{route('saveComment')}}" method="POST">
                @csrf
                <div class="col-sm-1 form-group">
                  <a class="header_img pull-left m-1" href="{{route('profile.index')}}">
                    <img src="{{asset(auth()->user()->image ? auth()->user()->image : '/images/no_user.png')}}" class="profile-picture-small pull-left"/>
                  </a>
                </div>
                <div class="col-sm-11">
                  <span class="post-user-name">{{auth()->user()->name}}</span>
                </div>

                <div class="col-sm-9 form-group">
                  <textarea rows="1" name="comment" class="comment-write" placeholder="Add Comment" oninput="auto_height(this)"></textarea>
                </div>

                <div class="col-sm-2 form-group">
                  <input type="hidden" name="post_id" value="{{$post['id']}}">
                  <button type="submit" class="btn btn-success btn-xs">Comment</button>
                </div>
              </form>
            </div>

          </div>
        </div>
        @endforeach
      </div>
      @include('layouts.actives')
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
function like(post_id){
  var elem = document.getElementById("post_like_count_"+post_id);
  var count = parseInt(elem.innerHTML);

  $.ajax({
    url: '{{route('updateLikes')}}',
    type: 'POST',
    dataType: 'json',
    async: false,
    data: {
      post_id: post_id,
      _token: '{{csrf_token()}}'
    },
    success: function (data){
      if(data.success){
        elem.innerHTML = count + parseInt(data.result);
        highlight(elem);
      }
    }

  });
}

function comment(post_id){
  var elem = $('#post_comment_'+post_id);

  if(elem.is(":visible")){
    elem.hide();
  } else{
    elem.show();
  }

}
function highlight(elem){
  elem.style.color = "red";
  elem.parentElement.parentElement.style.transform="scale(1.5)";
  setTimeout(function(){
    elem.style.color="";
    elem.parentElement.parentElement.style.transform="scale(1)";
  },300);
}
</script>
@endpush
