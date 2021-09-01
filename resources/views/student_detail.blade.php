@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="container mt-5">
    <div class="row">
      <div class="info col-md-6">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <th><h1>Student's Detail Info</strong></h1></th>
            </tr>
            <tr>
              <th class="button-image col-md-4">
                <img class="img-circle" src="{{asset($std_info->image?$std_info->image:'/images/no_user.png')}}">
              </th>
            </tr>
            <tr>
              <td><strong>Name :</strong>  {{$std_info->name}}</td>
            </tr>
            <tr>
              <td><strong>ID :</strong>  {{$std_info->roll}}</td>
            </tr>
            <tr>
              <td><strong>Phone :</strong>  {{$std_info->mobile}}</td>
            </tr>
            <tr>
              <td><strong>Email :</strong>  {{$std_info->email}}</td>
            </tr>
            <tr>
              <td><strong>Joined at :</strong>  {{date('d.m.Y', strtotime($std_info->created_at))}}</td>
            </tr>
            <tr>
              <td>
                <strong>Courses :</strong>
                @if($std_courses[0]!="[]")
                <h8>
                  {{str_replace("]","",str_replace("[","",str_replace('"','',$std_courses[0])))}}
                </h8>
                @else
                {{$std_info->name}} does not join any course yet.
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="info col-md-6">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <th><h1>Student's Evaluation</strong></h1></th>
            </tr>
            <tr>
              <td>{{$std_info->name}} does not attend any test yet.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
