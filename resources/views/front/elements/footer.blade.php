<footer class="footer">
    <div class="container">
        <div class="col-xs-12  col-md-3">
            <div class="widget-about  push-down-30">
                <img src="{!! asset(config('model.admin.path_folder_photo_website').$INFO_SITE->logo_site) !!}" alt="Logo" width="176" height="70">
                <br/>

                <span class="footer__text">
                    {!! $INFO_SITE->site_des !!}
                </span>
            </div>
        </div>

        <!--Tags-->
        <div class="col-xs-12  col-md-3">
            @include('front.elements.tags')
        </div>

        <div class="col-xs-12  col-md-3">
            <nav class="widget-navigation  push-down-30">
                <h6>Navigation</h6>
                <hr>
                <ul class="navigation">
                    <li> <a href="{!! route('website.index') !!}">Home</a> </li>
                    <li> <a href="{!! route('website.about') !!}">About</a> </li>
                    <li> <a href="{!! route('website.contact.index') !!}">Contact</a> </li>
                </ul>
            </nav>
        </div>

        <div class="col-xs-12  col-md-3">
            <div class="widget-contact  push-down-30">
                <h6>Contact Us</h6>
                <hr>
                <span class="widget-contact__text">
                    <span class="widget-contact__title">{!! $INFO_SITE->site_name !!}</span>
                    <br>Email: {!! $INFO_SITE->email !!}
                    <br>Skype: {!! $INFO_SITE->skype !!}
                    <br>Fanpage: <a href= "{!! $INFO_SITE->facebook !!}">
                                    {!! $INFO_SITE->facebook !!}
                                </a>
                </span>
            </div>
        </div>
    </div>
</footer>