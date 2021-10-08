<div class="padding container-fluid d-flex justify-content-center mt-5">
  <div class="col-md-6">
    <div class="add_course bg-dark h-100">
      <h2 class="my-4 heading text-center">Add Questions</h2>
      <form method="POST" action="{{route('add_question')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for='course_code'>Course Code</label>
          <input type="text" class="form-control btn-block" id='course_code' name='course_code' placeholder='Enter course code' required>
        </div>
        <div class="form-group">
          <label for='exam_topic'>Exam Topic</label>
          <input type="text" class="form-control btn-block" id='exam_topic' name='exam_topic' placeholder='Enter exam topic' required>
        </div>
        <div class="form-group">
          <label for='exam_date'>Exam Date</label>
          <input type="date" class="form-control btn-block" id='exam_date' name='exam_date' required>
        </div>
        <div class="form-group">
          <label for='exam_start'>Exam Start</label>
          <input type="time" class="form-control btn-block" id='exam_start' name='exam_start' required>
        </div>
        <div class="form-group">
          <label for='exam_end'>Exam End</label>
          <input type="time" class="form-control btn-block" id='exam_end' name='exam_end' required>
        </div>
        <div class="form-group">
          <label for='file'>Exam Questions</label>
          <input name="file" id="file" class="form-control" type="file"/>
        </div>
        <div class="form-group">
          <label for='question_no'>No. of Questions</label>
          <input type="number" class="form-control btn-block" id='question_no' name='question_no' placeholder='How many questions?' required>
        </div>
        <div class="form-group">
          <label for='marks'>Exam Marks</label>
          <input type="text" class="form-control btn-block" id='exam_mark' name='marks' placeholder='Enter exam marks' required>
        </div>
        <input type="txt" value="{{auth()->user()->name}}" name='course_teacher' placeholder='course_teacher' hidden>
        <button type="submit" class="btn btn-success mb-4 mt-4" style="float: right;">Add Question</button>
      </form>
    </div>
  </div>
</div>
