@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if(session()->has('success'))
    <div class="alert alert-success mt-5" style="text-align: center;">
      {{ session()->get('success') }}
    </div>
    @endif
    <div class="container mt-5">
      <div class="row">
        <div class="col-sm-10 mx-auto">
          <table class="table table-responsive rounded border t-center p-4">
            <tbody>
              <th colspan="4">
                <h4 align="center">
                  <strong>
                    Submissions of {{$topic}}
                  </strong>
                </h4>
              </th>
              @if($ansInfo->isNotEmpty())
              <tr class="table-headings">
                <th>Submitted Student</th>
                <th>Submission Time</th>
                <th>Marks</th>
              </tr>
              @foreach($ansInfo as $ans)
              <tr>
                <td>
                  {{$ans->submitted_student}}
                </td>
                <td>{{date('F j, Y (D), g:i a', strtotime($ans->created_at))}}</td>
                <td>{{$ans->marks}}</td>
              @endforeach
              @else
              <tr>
                <td align='center'>No Student Have Submitted Yet!</td>
              </tr>
              @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
