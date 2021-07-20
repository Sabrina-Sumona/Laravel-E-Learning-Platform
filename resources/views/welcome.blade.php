<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy E-Learning</title>
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
  <div class="header">
      <div class="navbar">
        <div class="title">
          <h2><a href="{{ url('/')}}">
            Happy E-Learning<a href="{{ url('/')}}">
          </a></h2>
      </div>
  </div>

    <!-- Login Page -->
    <div class="account-page">
      <hr><hr><hr><hr><hr><hr>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="{{ asset('images/image1.png')}}" width="70%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="Indicator">
                        </div>
                        <form id="LoginForm" action="/users" method="GET">
                            @csrf
                            <input type="email" name="email" placeholder="Email">
                            <input type="password" name="pass" placeholder="Password">
                            <button type="submit" class="btn">Login</button>
                            <a href="">Forget Password</a>
                        </form>

                        <form id="RegForm" action="/users" method="POST">
                            @csrf
                            <input type="text" name="uname" placeholder="Username" required>
                            <input type="email" name="email" placeholder="Email">
                            <input type="text" name="mobile" placeholder="Mobile">
                            <input type="password" name="pass" placeholder="Password" required>
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <hr><hr><hr><hr><hr><hr>
    </div>


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-2">
                  <ul>
                      <li>Facebook</li>
                      <li>Twitter</li>
                      <li>Instagram</li>
                      <li>Youtube</li>
                  </ul>
                </div>
                <div class="footer-col-2">
                  <h3>Follow Us</h3>
                </div>
            </div>
            <hr>
            <p class="copyright">Copyright 2021 - Sabrina Sumona</p>
        </div>
    </div>
    <!-- javascript -->

    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        function menutoggle() {
            if (MenuItems.style.maxHeight == "0px") {
                MenuItems.style.maxHeight = "200px"
            }
            else {
                MenuItems.style.maxHeight = "0px"
            }
        }
    </script>

    <!-- Toggle Form -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
        function register() {
            RegForm.style.transform = "translatex(300px)";
            LoginForm.style.transform = "translatex(300px)";
            Indicator.style.transform = "translateX(0px)";

        }
        function login() {
            RegForm.style.transform = "translatex(0px)";
            LoginForm.style.transform = "translatex(0px)";
            Indicator.style.transform = "translate(100px)";

        }
    </script>

</body>

</html>
