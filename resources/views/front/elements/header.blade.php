<header class="header  push-down-45">
    <div class="container">
        <div class="logo  pull-left">
            <a href="{!! url('/') !!}">
                <img src="{!! asset(config('model.admin.path_folder_photo_website').$INFO_SITE->logo_site) !!}" alt="ChickenElectric" width="352" height="140">
            </a>
        </div>
         
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#readable-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <nav class="navbar  navbar-default" role="navigation">
            <div class="collapse  navbar-collapse" id="readable-navbar-collapse">
                <ul class="navigation">
                    <li {!! classActivePath('/') !!}>
                        <a href="{!! url('/') !!}">Home</a>
                    </li>
                    <li class="">
                        <a href="{!! route('website.about') !!}">About</a>
                    </li>
                    <li class="">
                        <a href="{!! route('website.contact.index') !!}">Contact</a>
                    </li>

                    @if (session('status') === "admin")
                        <li>
                             <a href="{!! route('admin.index') !!}">Adminstrator</a>
                        </li>
                    @endif

                    @if(session('status') === "redac")
                        <li>
                             <a href="{!! route('redac.posts.index') !!}">Redaction</a>
                        </li>
                    @endif

                    @if (session('status') === "visitor")
                        <li {!! classActivePath('auth/login') !!}>
                             <a href="{!! url('auth/login') !!}">Login</a>
                        </li>
                    @else
                        <li {!! classActivePath('auth/logout') !!}>
                             <a href="{!! url('auth/logout') !!}">Logout</a>
                        </li>
                    @endif

                </ul>
            </div> 
        </nav>

        <div class="hidden-xs  hidden-sm">
            <a href="#" class="search__container  js--toggle-search-mode"> 
                <span class="glyphicon  glyphicon-search"></span> 
            </a>
            <div class="social">
                <a href="https://www.facebook.com/BkaIct" target="_blank" class="social__container"> 
                    <span class="zocial-facebook"></span> 
                </a>
            </div>
        </div>

        @if(session('status') !== "visitor")
            <div class="info-user pull-right">
                <img src="{!! getImageAvatar(Auth::user()) !!}" class="img-circle" id="icon-user">
                <a href="#"><span>{!! Auth::user()->username !!}</span></a>
            </div>
        @endif
    </div>
</header>

@include ('front.elements.search_box')