@extends('front.home')
@section('title', 'About')

@section('contentLeft')
    
    <div class="widget-author  boxed  push-down-30">
        <div class="widget-author__image-container">
            <img class="wp-post-image" src="{!! asset(config('model.admin.path_folder_photo_website').$INFO_SITE->image_admin) !!}" alt="About Us image" width="748" height="324">
        </div>
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <div class="widget-author__content">
                    <h4>Giới thiệu</h4>
                    <p>
                        {!! $INFO_SITE->admin_des !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop