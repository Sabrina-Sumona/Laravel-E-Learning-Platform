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
              @if($students_id[$index]!="[]")
              <td>
                <h8>
                  {!! str_replace(",","<br>",str_replace("]","",str_replace("[","",$students_id[$index])))!!}
                </h8>
              </td>
              @else
              <td colspan="2">
                <h8>
                  No student has been joined yet!
                </h8>
                <hr class="line">
              </td>
              @endif
              @if($students_name[$index]!="[]")
              <td>
                <h8>
                  {!! str_replace(",","<br>",str_replace("]","",str_replace("[","",str_replace('"','',$students_name[$index])))) !!}
                </h8>
                <hr class="line">
              </td>
              @endif
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
