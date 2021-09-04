<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Happy Learning</title>
  <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
  <link rel="stylesheet" href="{{ url('/css/courses.css') }}">
  <link rel="stylesheet" href="{{ url('/css/sidebar.css') }}">
  <link rel="stylesheet" href="{{ url('/css/profile.css') }}">
  <link rel="stylesheet" href="{{ url('/css/lms.css') }}">
  <link rel="stylesheet" href="{{ url('/css/tasks.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body id="body-pd">
  <div class="main">
    <div class="container-fluid">
      @include('layouts.sidebar')
      @yield('center')
    </div>
  </div>
  @stack('scripts')
</body>

</html>
