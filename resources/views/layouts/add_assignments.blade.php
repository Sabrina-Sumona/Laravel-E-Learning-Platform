<div class="padding container-fluid d-flex justify-content-center mt-5">
  <div class="col-md-4">
    <div class="add_course bg-dark h-100">
      <h2 class="my-4 heading text-center">Add Assignments</h2>
      <form method="POST" action="{{route('add_assignment')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for='course_code'>Course Code</label>
          <input type="text" class="form-control btn-block" id='course_code' name='course_code' placeholder='Enter course code' required>
        </div>
        <div class="form-group">
          <label for='due_date'>Due Date</label>
          <input type="date" class="form-control btn-block" id='due_date' name='due_date' required>
        </div>
        <div class="form-group">
          <label for='assignment_topic'>Assignment Topic</label>
          <input type="text" class="form-control btn-block" id='assignment_topic' name='assignment_topic' placeholder='Enter assignment topic' required>
        </div>
        <div class="form-group">
          <label for='assignment_detail'>Assignment Detail</label>
          <textarea class="form-control btn-block" id='assignment_detail' name='assignment_detail' placeholder='Enter assignment detail' required></textarea>
        </div>
        <div class="form-group">
          <label for='assignment_mark'>Assignment Mark</label>
          <input type="text" class="form-control btn-block" id='assignment_mark' name='assignment_mark' placeholder='Enter assignment mark' required>
        </div>
        <input type="txt" value="{{auth()->user()->name}}" name='course_teacher' placeholder='course_teacher' hidden>
        <button type="submit" class="btn btn-success mb-4 mt-4" style="float: right;">Add Assignment</button>
      </form>
    </div>
  </div>
</div>
