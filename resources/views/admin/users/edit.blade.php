@extends('admin.layouts.master')

@section('main')

<div class="col-xs-12 boxed" style="margin-bottom: 20px;">
    <h3 class="form-group">Chỉnh sửa.</h3>
    <hr>
    @include('front.elements.flash_notification')

    {!! Form::model($user, ['route' => ['admin.users.edit', $user->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label for="username" class="col-xs-3 control-label">Username</label>
        <div class="col-xs-9">
            {!! Form::text('username', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-xs-3 control-label">Email</label>
        <div class="col-xs-9">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="role_id" class="col-xs-3 control-label">Quyền</label>
        <div class="col-xs-4">
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label class="col-xs-3 control-label"></label>
        <div class="col-xs-4">
            {!! Form::checkbox('is_active', null , true) !!}
            Active
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Lưu thay đổi', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
    </div>

    {!! Form::close() !!}
</div>
@stop