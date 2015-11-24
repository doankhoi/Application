@extends('front.master')

@section('title', 'Đăng nhập')

@section('content')

{!! Form::open(['url' => 'auth/login']) !!}
<div class="col-xs-12 boxed">
    <h3 class="form-group text-center">Chicken Electric</h3>
    @include('front.elements.flash_notification')
    <div class="form-group">
        <label for="log" class="col-xs-3 control-label">Tên đăng nhập</label>
        <div class="col-xs-9 input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-user"></i>
            </span>
            {!! Form::text('log', null, ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-xs-3 control-label">Mật khẩu</label>
        <div class="col-xs-9 input-group">
            <span class="input-group-addon">
                <i class="glyphicon glyphicon-lock"></i>
            </span>
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>
    <div class="form-group">
        <label for="memory" class="col-xs-3 control-label"></label>
        <div class="col-xs-5">
            {!! Form::checkbox('memory', null, null) !!} Nhớ mật khẩu.
        </div>
        <div class="col-xs-4">
            <a href="{!! url('auth/register') !!}">Tạo tài khoản mới.</a>
        </div>
    </div>

    <div class="form-group text-center push-down-20">
        {!! Form::submit('Đăng nhập', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
    </div>
    <div class="clearfix"></div>
</div>
{!! Form::close() !!}

@stop