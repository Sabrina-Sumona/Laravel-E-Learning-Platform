<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="images/png" href="images/logo.png" sizes="16x16">
  <link rel="stylesheet" href="{{ url('/css/pass_mail.css') }}">
  <title>Happy Learning</title>
</head>
  <body>
    <div class="conf">
      @if($success=='true')
      <h1>
        Password reset mail has been sent. Please check your mailbox.
      </h1>
      @elseif($success=='false')
      <h1>
        Invalid Request!!
      </h1>
      @endif
    </div>
  </body>
</html>
