<div class="padding container-fluid d-flex justify-content-center mt-5">
  <div class="col-md-8">
    <div class="add_course bg-dark h-100">
      <h2 class="my-4 heading text-center">Add Self Assessment Questions</h2>
      <form method="POST" action="{{route('add_quiz')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="form-group col-4">
            <label for='course_code'>Course Code</label>
            <input type="text" class="form-control" id='course_code' name='course_code' placeholder='Enter course code' required>
          </div>
          <div class="form-group col-4">
            <label for='quiz_topic'>Quiz Topic</label>
            <input type="text" class="form-control" id='quiz_topic' name='quiz_topic' placeholder='Enter quiz topic' required>
          </div>
          <div class="form-group col-4">
            <label for='marks'>Quiz Marks</label>
            <input type="text" class="form-control btn-block" id='marks' name='marks' placeholder='Enter quiz marks' required>
          </div>
        </div>
        @for ($i = 0; $i < 20; $i++)
        <hr>
        <div class="row">
          <div class="form-group col-2">
            <label for='question_no[i]'>Question no.</label>
            <input type="number" class="form-control btn-block" id='question_no[]' name='question_no[]'>
          </div>
          <div class="form-group col-7">
            <label for='question[i]'>Question</label>
            <textarea class="form-control btn-block" id='question[]' name='question[]'></textarea>
          </div>
          <div class="form-group col-3">
            <label for='answer[i]'>Answer</label>
            <input type="text" class="form-control btn-block" id='answer[]' name='answer[]'>
          </div>
        </div>
        <div class="row">
          @for ($j = 0; $j < 4; $j++)
          <div class="form-group col-3">
            <label for='option[][]'>Option {{$j+1}}</label>
            <input type="text" class="form-control btn-block" id='option[][]' name='option[][]'>
          </div>
          @endfor
        </div>
        @endfor
        <input type="txt" value="{{auth()->user()->name}}" name='course_teacher' placeholder='course_teacher' hidden>
        <button type="submit" class="btn btn-success mb-4 mt-4" style="display: block; margin: 0 auto;">Add Quiz Questions</button>
      </form>
    </div>
  </div>
</div>
