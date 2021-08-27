@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if($length!=0)
    <div class="container mt-5">
      <div class="row">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr class="table-headings">
              <th>Course codes:</th>
              <th>Students ID:</th>
              <th>Students Name:</th>
            </tr>
            @for($index=0; $index<$length; $index++)
            <tr>
              <td>
                <h5>
                  {{$cCodes[$index]}}
                </h5>
              </td>
              <td>
                <h8>
                  @if($students_id[$index]!="[]")
                  {{$students_id[$index]}}
                  @else
                  No student
                  @endif
                </h8>
              </td>
              <td>
                <h8>
                  @if($students_name[$index]!="[]")
                  {{$students_name[$index]}}
                  @else
                  No student
                  @endif
                </h8>
                <hr class="line">
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
    @else
    <div class="container mt-5">
      <div class="row">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <th><h1><strong>You Don't Add Any Courses Yet</strong></h1></th>
            </tr>
            <tr>
              <td>Please go to courses page and add some courses. Then the joined students info will be appeared here.</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    @endif
  </div>
</div>
@endsection
