<div class="container-fluid col-md-7">
  <table class="table table-responsive rounded border t-center">
    <tbody>
      <tr>
        <th colspan="3"><h1 align="center">Student's Evaluation</h1></th>
      </tr>
      <tr>
        <th>Examinations</th>
        <th>Marks</th>
      </tr>
      @foreach($assignmentResults as $assignmentResult)
      <tr>
        <td>{{$assignmentResult->topic}}</td>
        @if($assignmentResult->marks==null)
        <td>N/A</td>
        @else
        <td>{{$assignmentResult->marks}} marks</td>
        @endif
      </tr>
      @endforeach
      @foreach($quizResults as $quizResult)
      <tr>
        <td>{{$quizResult->topic}}</td>
        <td>{{$quizResult->marks}} marks</td>
      </tr>
      @endforeach
      @foreach($writtenResults as $writtenResult)
      <tr>
        <td>{{$writtenResult->topic}}</td>
        @if($writtenResult->marks==null)
        <td>N/A</td>
        @else
        <td>{{$writtenResult->marks}} marks</td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
