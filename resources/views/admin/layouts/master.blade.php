<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/admin.css') }}">

  </head>

  <body>
    <!--Insert navabar-->
    @yield('navabar')
    <!--End Insert navabar-->

    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-3 col-md-2 sidebar">
          @yield('sidebar_dashboard')
        </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <!-- Control_dashboard-->
          @yield('control')
          <!--Control_dashboard-->

          <h2 class="sub-header">
            @yield('sub_header')
          </h2>

          <div class="main-content">
            @yield('content')
          </div>

        </div>
        
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/config-tinymce.js') }}"></script>
  </body>
</html>
