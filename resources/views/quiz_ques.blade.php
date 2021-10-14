@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger mt-5" align='center'>{{ $error }}</div>
    @endforeach
    @endif
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
    <div class="padding container-fluid d-flex justify-content-center mt-5 ">
      <div class="col-sm-8">
        <div class="add_course bg-dark h-100 quiz" style="overflow-x: hidden;">
          <h2 class="my-4 heading text-center">{{$cCode}}: {{$topic}}</h2>
          <form method="POST" action="{{route('submitQuiz')}}">
            @csrf
            @for($i = 0; $i < 20; $i++)
            <hr>
            <div class="row">
              <div class="form-group">
                <h5>{{$i+1}}. {{$questions[$i]}}</h5>
                @if(auth()->user()->role == 'tchr')
                <p>Correct answer: {{$answer[$i]}}</p>
                @endif
                @for($j = 0; $j < 4; $j++)
                <div class="form-check">
                <input name="ans{{$i}}" class="form-check-input" type="radio" value="{{implode(" ",$options[$count])}}">
                <label for="gender" class="form-check-label">{{implode(" ",$options[$count++])}}</label>
                </div>
                @endfor
              </div>
            </div>
            @endfor
            @if(auth()->user()->role == 'std')
            <input value="{{$topic}}" name='topic' hidden>
            <input value="{{$cCode}}" name='cCode' hidden>
            <button type="submit" class="btn btn-success mb-4 mt-4" style="display: block; margin: 0 auto;">Submit Quiz</button>
            @endif
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
