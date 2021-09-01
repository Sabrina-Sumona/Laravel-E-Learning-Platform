<div class="container mt-5">
  <div class="row">
    <div class="col-md-8 mx-auto">
      <form method="POST" action="{{route('student_detail')}}">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control btn-block" id='std' name='std' placeholder="Enter Student's ID" required>
        </div>
        <button type="submit" class="btn btn-primary mb-4 mt-4" style="float: right;">View Student's Details</button>
      </form>
    </div>
  </div>
</div>
