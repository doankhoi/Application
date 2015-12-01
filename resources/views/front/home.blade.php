@extends('front.master')

@section('content')
    <div class="row">
        <div class="col-xs-12  col-md-8">
            @yield('contentLeft')
        </div>

        <div class="col-xs-12  col-md-4">

            <div class="widget-author  boxed  push-down-30">
                @include('front.elements.author', ['author' => $author])
            </div> <!--End about author-->

            <div class="sidebar  boxed  push-down-30">
                <div class="row">
                    <div class="col-xs-10  col-xs-offset-1">
                        
                        <!--Categories-->
                        @include('front.elements.categories', ['categories' => $categories])

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
@stop