@extends('admin.layouts.master')

@section('main')
    <div class="col-sm-12">
        @yield('form')
        @if(session('status') === "admin")
            <div class="form-group checkbox pull-right">
                <label>
                    {!! Form::checkbox('is_active') !!}
                    Published.
                </label>
            </div>
        @endif
        <div class="form-group">
            <label for="title">Tiêu đề</label>
            {!! Form::text('name', null, ['id' => 'name', 'class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Hoàn tất', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@stop
