@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row mt-5">
    <div class="container-fluid col-md-7">
      <table class="table table-responsive rounded border">
        <tbody>
          <tr>
            <th colspan="2"><h1>Student's Detail Info</h1></th>
          </tr>
          <tr>
            <td class="button-image col-md-4">
              <img src="{{asset($std_info->image?$std_info->image:'/images/no_user.png')}}">
            </td>
            <td>
              <li><strong>Name :</strong>  {{$std_info->name}}</li>
              <li><strong>ID :</strong>  {{$std_info->roll}}</li>
              <li><strong>Phone :</strong>  {{$std_info->mobile}}</li>
              <li><strong>Email :</strong>  {{$std_info->email}}</li>
              <li><strong>Joined at :</strong>  {{date('d.m.Y', strtotime($std_info->created_at))}}</li>
              <h4><strong>Courses</strong></h4>
              @if($std_courses!=null)
              @for($index=0; $index<$length; $index++)
              <li>{{$std_courses[$index]}}({{$std_credits[$index]}} credits)</li>
              @endfor
              <strong>Total Credit = {{$Total_credits}}</strong>
              @else
              {{$std_info->name}} has not join any course yet.
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
<div class="row mt-4">
@include('layouts.evaluations')
</div>
@endsection
