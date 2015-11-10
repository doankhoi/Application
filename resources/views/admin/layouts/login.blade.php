
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <meta name="description" content="">
  <meta name="author" content="">

  <title>ChickenElectric - Đăng nhập</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
  <div class="container main-login">
    <div class="title-login">
        <img src="{{ asset('assets/images/website/icon_login.jpg') }}" class="img-responsive img-circle" align="middle">
        <p>Chicken Electric</p>
    </div>
    @include('admin.elements.flash_notification')
    
    {!! Form::open(['route' => 'admin.login', 'role' => 'form']) !!}
       <div class="form-group">
            {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email']) !!}
       </div>

       <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter password']) !!}
      </div>
      {!! Form::submit('Đăng nhập', ['class' => 'btn btn-default bt-login'])!!}
    {!! Form::close() !!}
  </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
</body>
</html>
