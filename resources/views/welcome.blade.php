<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Happy Learning</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-2">
        <div class="title">
          <h1>Happy Learning</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <a href="{{route('login')}}">
            <input  type="button" class="btn btn-primary" value="LogIn">
        </a>
      </div>
      <div class="col-6">
          <a href="{{route('register')}}">
              <input  type="button" class="btn btn-info" value="Register">
          </a>
      </div>
    </div>
    <div class="row">
        <div class="col-2">
            <img src="{{ asset('images/image1.png')}}" width="100%">
        </div>
    </div>
  </div>
</body>

</html>
