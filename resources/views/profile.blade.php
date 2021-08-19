@extends('layouts.main')

@section('center')
<div class="container mt-5">
  <form action="{{route('profile.edit')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="text-center" onmouseover="showUploadButton();" onmouseout="hideUploadButton();">
      <div class="form-group button-image">
        <img class="img-circle" src="{{asset(Auth::user()->image?Auth::user()->image:'/images/no_user.png')}}">
        <label onmouseover="showUploadButton();" class="btn btn-success image-upload" >
          <input name="image" type="file" style="display: none;" required/> Upload
        </label>
        <br><br>
      </div>
      <div class="form-group">
        <button class="image-upload btn btn-success" style="display: none;" type="submit">Save</button>
      </div>
    </div>
  </form>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <td><strong>User Name :</strong></td>
              <td id="f_name">{{auth()->user()->uname}}</td>
              <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="setField('uname');">
                  Edit
                </button>
              </td>
            </tr>
            <tr>
              <td><strong>Phone No. :</strong></td>
              <td id="f_name">{{auth()->user()->mobile}}</td>
              <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="setField('mobile');">
                  Edit
                </button>
              </td>
            </tr>
            <tr>
              <td><strong>Email :</strong></td>
              <td id="email">{{auth()->user()->email}}</td>
              <td>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="setField('email');">
                  Edit
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title" id="exampleModalLongTitle"><b>Edit</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{route('profile.update', auth()->user()->id)}}" method="POST">
        <div class="modal-body">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="col-sm-4">
              <h4><label id="fld_name" class="pull-right"></label></h4>
              <input type="hidden" name="fld_name" id="field">
            </div>
            <div class="col-sm-8">
              <input class="form-group" type="text" value="" id="fld_value" name="fld_value" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function setField(field_name) {
    $('#fld_name').html(field_name.charAt(0).toUpperCase()+field_name.substr(1).toLowerCase());
    var field_value= $('#'+field_name).html();

    $('#fld_value').val(field_value);
    $('#field').val(field_name);
  }

  function hideUploadButton() {
    $('.image-upload').hide();
  }

  function showUploadButton() {
    $('.image-upload').show();
  }
</script>
@endpush
