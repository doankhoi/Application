<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="chicken-electric">
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
    <div class="row">
        <div class="col-xs-12  col-md-8">
            @yield('content')
        </div>

        <div class="col-xs-12  col-md-4">

            <div class="widget-author  boxed  push-down-30">
                @include('front.elements.author')
            </div> <!--End about author-->

            <div class="sidebar  boxed  push-down-30">
                <div class="row">
                    <div class="col-xs-10  col-xs-offset-1">
                        
                        <!--Categories-->
                        @include('front.elements.categories')

                        <!--Facebook-->
                        @include('front.elements.facebook_plugin')
                        
                        <!--Post recents and popular-->
                        @include('front.elements.post_recents_and_popular')
                        
                        <!--Tags-->
                        @include('front.elements.tags')
                     
                        <!--Recents comments-->
                        @include('front.elements.recents_comments')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('front.elements.footer')

@include('front.elements.footer_copyright')

<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="{!! asset('assets/js/bootstrap.js') !!}"></script>
<script src="{!! asset('assets/js/front.js') !!}"></script>
<script type="text/javascript" src="{!! asset('assets/js/custom_front.js') !!}"></script>
@yield('script')

</body>
</html>