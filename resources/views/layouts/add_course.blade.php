<div class="padding container-fluid d-flex justify-content-center mt-5">
  <div class="col-md-4">
    <div class="add_course bg-dark h-100">
      <h2 class="my-4 heading text-center">Add New Course</h2>
      <form method="POST" action="{{route('add_course')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for='course_code'>Course Code</label>
          <input type="text" class="form-control btn-block" id='course_code' name='course_code' placeholder='Enter course code' required>
        </div>
        <div class="form-group">
          <label for='course_title'>Course Title</label>
          <input type="text" class="form-control btn-block" id='course_title' name='course_title' placeholder='Enter course title' required>
        </div>
        <div class="form-group">
          <label for='credit_hours'>Credit Hours</label>
          <input type="text" class="form-control btn-block" id='credit_hours' name='credit_hours' placeholder='Enter credit hours' required>
        </div>
        <div class="form-group">
          <label for='join_code'>Join Code</label>
          <input type="text" class="form-control btn-block" id='join_code' name='join_code' placeholder='Enter join code' required>
        </div>
        <input type="txt" value="{{auth()->user()->name}}" name='course_teacher' hidden>
        <input type="txt" value="{{auth()->user()->image}}" name='course_teacher_image' placeholder='course_teacher_image' hidden>

        <button type="submit" class="btn btn-success mb-4 mt-4" style="float: right;">Add Course</button>
      </form>
    </div>
  </div>
</div>
