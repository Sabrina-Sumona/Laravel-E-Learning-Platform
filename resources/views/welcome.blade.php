<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Happy Learning</title>
</head>

<body>
    <div class="account-page">
        <div class="container">
          <div class="row">
            <div class="col-2">
              <div class="title">
                <h1>Happy Learning</h1>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <a href="{{ url('/login') }}">
                  <input  type="button" class="btn btn-primary pull-right" value="Login">
              </a>
            </div>
            <div class="col-sm-6">
                <a href="{{ url('/registration') }}">
                    <input  type="button" class="btn btn-info pull-left" value="Register">
                </a>
            </div>
          </div>
          <div class="row">
              <div class="col-2">
                  <img src="{{ asset('images/image1.png')}}" width="100%">
              </div>
          </div>
          <div class="row">
            <p class="copyright">Copyright 2021 - Sabrina Sumona</p>
          </div>
        </div>
    </div>
  </body>

</html>

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
