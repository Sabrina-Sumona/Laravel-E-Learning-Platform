<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=10" >
  <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
  <link rel="stylesheet" href="{{ url('/css/courses.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .box{
          background: rgba(255,255,255,1);
          padding: 10px 20px;
          border-radius: 2px;
          box-shadow: 0px 0px 15px 5px rgba(0,0,0,0.4);
      }
  </style>
</head>
<body>
    @include('layouts.header')
    <div class="main">
        <div class="container-fluid">
            @yield('center')
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>
