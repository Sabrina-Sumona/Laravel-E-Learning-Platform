<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/css/registration.css') }}">
  <title>Happy Learning Registration</title>
</head>
<body>
    <form method="POST" action="/users" enctype="multipart/form-data">
        @csrf
        <div class="container reg">
            <h2>Registration Form</h2>
            @if(session()->has('error'))
                <div class="alert-warning" style="padding: 5px; text-align: center">
                    {{ session()->get('error') }}
                </div>
            @endif
            <hr>
            <div>
                <label for="name">Your Name<span>*</span></label>
                <input name="name" id="name" type="text" placeholder="Enter Your Name" required>
            </div>
            <div>
                <label for="uname">Your Username<span>*</span></label>
                <input name="uname" id="uname" type="text" placeholder="Enter Your Username" onchange="checkUsername(this.value); checkUser(this.value);" required>
                <small id="checktext"></small>
            </div>
            <div>
                <label for="roll">Your ID<span>*</span></label>
                <input name="roll" id="roll" type="text" placeholder="Enter Your ID" onchange="checkUserID(this.value);" required>
                <small id="checkID"></small>
            </div>
            <div>
                <label for="mobile">Your Phone No.</label>
                <input name="mobile" id="mobile" type="number" placeholder="Enter Your Mobile No." onchange="checkUserNo(this.value);">
                <small id="checkNo"></small>
            </div>
            <div>
                <label for="email">Your Email<span>*</span></label>
                <input name="email" id="email" type="text" placeholder="Enter Your Email" onchange="checkUsermail(this.value);" required>
                <small id="checkmail"></small>
            </div>
            <div id='optn'>
              <label for="role">Your Role<span>*</span></label>
              <br>
              <input name="role" id="tchr" value="tchr" type="radio">Teacher
              <input name="role" id="std" value="std" type="radio">Student
            </div>
            <div>
                <label for="password">Password<span>*</span></label>
                <input name="password" id="password" type="password" placeholder="Enter A Password" onchange="checkUserpass(this.value);" required>
                <small id="checkpass"></small>
             </div>
             <div>
                 <label for="rpassword">Password Confirmation<span>*</span></label>
                 <input name="rpassword" id="rpassword" type="password" placeholder="Repeat the Password" required>
             </div>
             <div id='optn'>
               <input name="yes" id="yes" value="yes" type="checkbox">Remember Me
             </div>
             <div style="text-align: center">
                 <p><span>***</span>By creating an account you agree to our Terms & Conditions.</p>
             </div>
             <div style="text-align: center; padding: 20px;">
                 <input type="submit" class="btn btn-success" value="Submit" name="submit">
             </div>
             <div style="text-align: center;">
                 <p>Already have an account?
                    <br>
                    <a href="{{ url('/login') }}">
                        <input  type="button" class="btn btn-primary" value="Sign In" style="margin: 15px;">
                    </a>
                </p>
             </div>
        </div>
    </form>
</body>
  <script type="text/javascript" src="/js/script.js"></script>
</html>

<script>
    window.onload= function(){
          document.getElementsByClassName('reg')[0].style.color='whitesmoke';
    };
</script>
<script>
    // using jquery
    $(document).ready(function(){
        $('.reg').css('color', 'whitesmoke');
    });
</script>
