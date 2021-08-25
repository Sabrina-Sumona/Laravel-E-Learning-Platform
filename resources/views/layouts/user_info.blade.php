<div class="row">
  <div class="container mt-5 col-md-6">
    <div class="container mt-5">
      <div class="row">
        <div class="info">
          <table class="table table-responsive rounded border">
            <tbody>
              <tr>
                <th><h1>Details User Info</strong></h1></th>
              </tr>
              <tr>
                <td><strong>Full Name :</strong>  {{auth()->user()->name}}</td>
              </tr>
              <tr>
                <td><strong>User Name :</strong>  {{auth()->user()->uname}}</td>
              </tr>
              <tr>
                <td><strong>ID :</strong>  {{auth()->user()->roll}}</td>
              </tr>
              <tr>
                <td><strong>Phone :</strong>  {{auth()->user()->mobile}}</td>
              </tr>
              <tr>
                <td><strong>Email :</strong>  {{auth()->user()->email}}</td>
              </tr>
              <tr>
                <td>
                  <strong>Role :</strong>
                  @if(auth()->user()->role == 'std') Student
                </td>
                @else Teacher
              </td>
              @endif
            </tr>
            <tr>
              <td><strong>Joined at :</strong>  {{date('d.m.Y', strtotime(auth()->user()->created_at))}}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
</div>
