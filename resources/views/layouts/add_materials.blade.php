<div class="padding container-fluid d-flex justify-content-center mt-5">
  <div class="col-md-4">
    <div class="add_course bg-dark h-100">
      <h2 class="my-4 heading text-center">Add course materials</h2>
      <form method="POST" action="{{route('add_materials')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for='course_code'>Course Code</label>
          <input type="text" class="form-control btn-block" id='course_code' name='course_code' placeholder='Enter the course code' required>
        </div>
        <div class="form-group">
          <label for='drive_link'>Drive Link</label>
          <input type="text" class="form-control btn-block" id='drive_link' name='drive_link' placeholder='Enter the drive link' required>
        </div>
        <button type="submit" class="btn btn-success mb-4 mt-4" style="float: right;">Add Materials</button>
      </form>
    </div>
  </div>
</div>
