<!DOCTYPE html>
<html class="no-sc">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="chicken-electric">
        @yield('meta')
        <link rel="shortcut icon" href="images/favicon.png">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.css') !!}">
        <link rel="stylesheet" href="{!! asset('assets/css/front.css') !!}"/>
        <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/custom_front.css') !!}">
        @yield('css')
        <script type="text/javascript" src="{!! asset('assets/js/config.js') !!}"></script>
    </head>
<body>
 
@include('front.elements.header')
<div class="container">
    @yield('content')
</div>

@include('front.elements.footer')

@include('front.elements.footer_copyright')

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="{!! asset('assets/js/bootstrap.js') !!}"></script>
<script src="{!! asset('assets/js/front.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/custom_front.js') !!}"></script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '914061281995373',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
@yield('script')
</body>
</html>