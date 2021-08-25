<div class="row">
  <div class="container mt-5 col-md-6">
    <div class="container mt-5">
      <div class="row">
        <div class="info">
          <table class="table table-responsive rounded border">
            <tbody>
              <tr>
                <th><h1>User Info</strong></h1></th>
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
@if(auth()->user()->role == 'std')
<div class="container mt-5 col-md-6">
  <div class="container mt-5">
    <div class="row">
      <div class="info">
        <table class="table table-responsive rounded border">
          <tbody>
            <tr>
              <th><h1>Course Fees</strong></h1></th>
            </tr>
            <tr>
              <td><strong>Total Credits = {{$Total_credits}}</strong></td>
            </tr>
            @if($Total_credits > 0)
            <tr>
              <td>Per Credit Fees = 1500 BDT</td>
            </tr>
            <tr>
              <td>Semester Fee = 1000 BDT</td>
            </tr>
            <tr>
              <td><strong>Total Course Fees</strong>
            </tr>
            <tr>
              <td> = Total Credits x Per Credit Fees + Semester Fee</td>
            </tr>
            <tr>
              <td>= ({{$Total_credits}} x 1500 + 1000) BDT</td>
            </tr>
            <tr>
              <td>= <strong>{{$Total_credits*1500+1000}} BDT</strong></td>
            </tr>
            @else
            <tr>
              <td><strong>Total Course Fees</strong> = 0.0 BDT</td>
            </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endif
</div>
