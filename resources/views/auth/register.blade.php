@extends('front.master')

@section('title', 'Đăng ký')

@section('content')


<div class="col-xs-12 boxed" style="margin-bottom: 20px;">
    <h3 class="form-group">Đăng ký thành viên.</h3>
    <hr>
    @include('front.elements.flash_notification')

{!! Form::open(['url' => 'auth/register', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="form-group">
            <div class="col-xs-2 col-xs-offset-1">
                @if(isset($user))
                    <img src="{!! asset(config('model.user_info.path_folder_photo_user').$user->photo) !!}" class="img-responsive" id="photo-user">
                @else
                    <img src="{!! asset(config('model.user_info.path_folder_photo_user'). config('model.user_info.photo_default')) !!}" class="img-responsive" id="photo-user">
                @endif
            </div>
            <div class="col-xs-7">
                {!! Form::file('photo', ['class' => 'form-control', 'id' => 'file-photo-user']) !!}
            </div>
            <div class="col-xs-2">
                <a href="javascript:void(0)" class="btn btn-primary" id="delete-photo-user">
                    Xóa ảnh
                </a>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-xs-3 control-label">Email</label>
        <div class="col-xs-9">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="username" class="col-xs-3 control-label">Tên đăng nhập</label>
        <div class="col-xs-9">
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-xs-3 control-label">Nhập lại mật khẩu</label>
        <div class="col-xs-9">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-xs-3 control-label">Mật khẩu</label>
        <div class="col-xs-9">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-xs-3 control-label">Tên đầy đủ</label>
        <div class="col-xs-1 control-label">
            <label>Họ</label>
        </div>
        <div class="col-xs-3">
            {!! Form::text('firstname', null, ['class' => 'form-control']) !!}
        </div>
        <div class="col-xs-1 control-label">
            <label>Tên</label>
        </div>
        <div class="col-xs-3">
            {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-xs-3 control-label">Sơ lược về bản thân</label>
        <div class="col-xs-9">
            {!! Form::text('description', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="gender" class="col-xs-3 control-label">Giới tính</label>
        <div class="col-xs-4">
            {!! Form::select('gender', config('model.user_info.gender'), null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="tel" class="col-xs-3 control-label">Điện thoại</label>
        <div class="col-xs-9">
            {!! Form::text('tel', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="city" class="col-xs-3 control-label">Thành phố</label>
        <div class="col-xs-9">
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="address" class="col-xs-3 control-label">Địa chỉ</label>
        <div class="col-xs-9">
            {!! Form::text('address', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label"></label>
        <div class="col-xs-9">
            {!! captcha_img('flat') !!}
        </div>
    </div>

    <div class="form-group">
        <label for="capcha" class="col-xs-3 control-label">Captcha</label>
        <div class="col-xs-9">
            {!! Form::text('capcha', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Đăng ký', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
    </div>

{!! Form::close() !!}
</div>

@stop