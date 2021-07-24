<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
    <title>Happy Learning Log In</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{ url('/css/login.css') }}">
</head>

<body>
    <div class="logo">

    </div>
    <form method="POST" enctype="multipart/form-data">
        <div class="box bg-img">
            <div class="content">
                <h2>Log<span> In</span></h2>
                <hr>
                <div class="forms">
                    <div class="user-input">
                        <input name="uname" type="text" class="login-input" placeholder="Username" id="name" required/>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="pass-input">
                        <input name="password" type="password" class="login-input" placeholder="Password" id="my-password" required/ >
                        <span class="eye" onclick="myFunction()">
                          <i id="hide-1" class="fas fa-eye-slash"></i>
                          <i id="hide-2" class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button class="login-btn" type="submit" name="submit">Sign In</button>
                <p class="new-account">Not a user? <a href="{{ url('/registration') }}">Sign Up now!</a></p>
                <br>

                <p class="f-pass">
                    <a href="#">Forgot password?</a>
                </p>

            </div>
        </div>
    </form>
    <script src="https://kit.fontawesome.com/c0078485ae.js" crossorigin="anonymous"></script>
</body>
</html>

<script>
    function myFunction() {
        var x = document.getElementById("my-password");
        var y = document.getElementById("hide-1");
        var z = document.getElementById("hide-2");

        if (x.type === "password") {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }

</script>
