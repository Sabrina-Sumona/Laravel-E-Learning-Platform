<div class="row">
  <div class="container mt-5 col-md-8">
    <div class="row">
      <table class="table table-responsive rounded border">
        <tbody>
          <tr>
            <th colspan="2"><h1>User Details</strong></h1></th>
          </tr>
          <tr>
            <td class="button-image col-md-4">
              <img src="{{asset(auth()->user()->image?auth()->user()->image:'/images/no_user.png')}}">
            </td>
            <td>
              <li><strong>Full Name :</strong>  {{auth()->user()->name}}</li>
              <li><strong>User Name :</strong>  {{auth()->user()->uname}}</li>
              <li><strong>ID :</strong>  {{auth()->user()->roll}}</li>
              <li><strong>Phone :</strong>  {{auth()->user()->mobile}}</li>
              <li><strong>Email :</strong>  {{auth()->user()->email}}</li>
              <li><strong>Role :</strong>  {{auth()->user()->role}}</li>
              <li><strong>Joined at :</strong>  {{date('d.m.Y', strtotime(auth()->user()->created_at))}}</li>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
