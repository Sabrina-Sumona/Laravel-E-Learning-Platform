@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <div class="row">
    @if($length!=0)
    <div class="container mt-5">
      <div class="row">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <th>Course codes:</th>
              @for($index=0; $index<$length; $index++)
              <td>
                <h6>
                  {{$cCodes[$index]}}
                </h6>
              </td>
              @endfor
              </tr>
              <tr>
                <th>Students ID:</th>
                @for($index=0; $index<$length; $index++)
              <td>
                <h8>
                  @if($students_id[$index]!="[]")
                  ID: {{$students_id[$index]}}
                  @else
                  No student
                  @endif
                </h8>
              </td>
              @endfor

                          </tr>
              <tr>
                <th>Students Name:</th>
                @for($index=0; $index<$length; $index++)
              <td>
                <h8>
                  @if($students_name[$index]!="[]")
                  Name: {{$students_name[$index]}}
                  @else
                  No student
                  @endif
                </h8>
              </td>
              @endfor
              </tr>

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
