@extends('admin.layouts.master')

@section('main')
    <style type="text/css">
        .title-info{
            font-weight: bold;
        }
        #img-logo{
            width: 100px;
            height: 90px;
        }
        #img-contact {
            width: 150px;
            height: 120px;
        }
    </style>

    <h3>Thông tin website</h3>
    <hr>
    @include('front.elements.flash_notification')

    <div class="form-horizontal">
        <div class="form-group">
            <div class="col-xs-3 title-info">Tên website</div>
            <div class="col-xs-9">
                {!! $admin->site_name !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Email liên hệ</div>
            <div class="col-xs-9">
                {!! $admin->email !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Skype</div>
            <div class="col-xs-9">
                {!! $admin->skype !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Fanpage Facebook</div>
            <div class="col-xs-9">
                {!! $admin->facebook !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Đặc tả trang</div>
            <div class="col-xs-9">
                {!! $admin->site_des !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Thông tin tác giả</div>
            <div class="col-xs-9">
                {!! $admin->admin_des !!}
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Logo website</div>
            <div class="col-xs-9">
                <img src="{!! asset(config('model.admin.path_folder_photo_website').$admin->logo_site) !!}" id="img-logo">
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-3 title-info">Ảnh liên hệ</div>
            <div class="col-xs-9">
                <img src="{!! asset(config('model.admin.path_folder_photo_website').$admin->image_admin) !!}" id="img-contact">
            </div>
        </div>

    </div>
@stop