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
        <label for="password" class="col-xs-3 control-label">Mật khẩu</label>
        <div class="col-xs-9">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="password_confirmation" class="col-xs-3 control-label">
        	Nhập lại mật khẩu
        </label>
        <div class="col-xs-9">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="role_id" class="col-xs-3 control-label">Quyền</label>
        <div class="col-xs-4">
            {!! Form::select('role_id', $roles, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Tạo mới', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
    </div>

{!! Form::close() !!}