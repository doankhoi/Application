<!DOCTYPE html>
 <html class="no-js"> 

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ChickenElectric</title>
    <meta name="description" content="">  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('assets/css/main_back.css') !!}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic">
    
    @yield('head')
  </head>

  <body>
   <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                @if(session('status') == 'admin')
                    <a href="{!! route('admin.index') !!}" class="navbar-brand">Adminstration</a>
                @else
                    <a href="{!! route('redac.index') !!}" class="navbar-brand">Redaction</a> 
                @endif
            </div>

            <!-- Menu navbar-->
            <ul class="nav navbar-right top-nav">
                <li>
                    <a href="{!! route('website.index') !!}">Back to site</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-user"></span> 
                        {{ auth()->user()->username }}<b class="caret"></b>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <a href="{!! url('auth/logout') !!}">
                                <span class="fa fa-fw fa-power-off"></span> 
                                Logout
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>

            <!-- Menu sidebar -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    @if(session('status') == 'admin')
                        <li {!! classActivePath('admin') !!}>
                            <a href="#">
                                <span class="fa fa-fw fa-dashboard"></span>
                                Dashboard
                            </a>
                        </li>
                        <li {!! classActiveSegment(1, 'user') !!}>
                            <a href="#" data-toggle="collapse" data-target="#usermenu">
                                <span class="fa fa-fw fa-user"></span> 
                                Users 
                                <span class="fa fa-fw fa-caret-down"></span>
                            </a>
                            <ul id="usermenu" class="collapse">
                                <li>
                                    <a href="#">
                                        Xem tất cả
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Thêm mới
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li {!! classActivePath('contact') !!}>
                            <a href="#">
                                <span class="fa fa-fw fa-envelope"></span> 
                                Messages
                            </a>
                        </li>  
                        <li {!! classActivePath('comment') !!}>
                            <a href="#">
                                <span class="fa fa-fw fa-comments"></span> 
                                Comments
                            </a>
                        </li> 
                    @endif

                    <li {!! classActivePath('medias') !!}>
                        <a href="#">
                            <span class="fa fa-fw fa-file-image-o"></span> 
                            Media
                        </a>
                    </li>
                    <li {!! classActiveSegment(1, 'blog') !!}>
                        <a href="#" data-toggle="collapse" data-target="#articlemenu">
                            <span class="fa fa-fw fa-pencil"></span> 
                            Posts
                            <span class="fa fa-fw fa-caret-down">
                        </a>
                        <ul id="articlemenu" class="collapse">
                            <li>
                                <a href="{!! route('redac.posts.index') !!}">
                                    Xem tất cả.
                                </a>
                            </li>
                            <li>
                                <a href="{!! route('redac.posts.create') !!}">
                                    Thêm mới
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                @yield('main')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /.page-wrapper -->

    </div>
    <!-- /.wrapper -->
    <script type="text/javascript" src="{!! asset('assets/js/jquery.min.js') !!}"></script>
    <script>
        window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')
    </script>
    <script type="text/javascript" src="{!! asset('assets/js/plugins.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/main.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('assets/js/custom_back.js') !!}"></script>
    @yield('scripts')

  </body>
</html>