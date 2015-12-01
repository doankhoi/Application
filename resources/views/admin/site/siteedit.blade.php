@extends('admin.layouts.master')

@section('main')
<div class="col-xs-12 boxed" style="margin-bottom: 20px;">
    <h3 class="form-group">Chỉnh sửa thông tin website.</h3>
    <hr>
    @include('front.elements.flash_notification')

    {!! Form::model($admin, ['route' => ['admin.site.edit', $admin->id], 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        <label for="site_name" class="col-xs-3 control-label">Tên website</label>
        <div class="col-xs-9">
            {!! Form::text('site_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-xs-3 control-label">Email</label>
        <div class="col-xs-9">
            {!! Form::text('email', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="skype" class="col-xs-3 control-label">Skype</label>
        <div class="col-xs-9">
            {!! Form::text('skype', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="facebook" class="col-xs-3 control-label">Fanpage Facebook</label>
        <div class="col-xs-9">
            {!! Form::text('facebook', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="site_des" class="col-xs-3 control-label">Đặc tả website</label>
        <div class="col-xs-9">
            {!! Form::textarea('site_des', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="admin_des" class="col-xs-3 control-label">Thông tin tác giả</label>
        <div class="col-xs-9">
            {!! Form::textarea('admin_des', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="image_admin" class="col-xs-3 control-label">Ảnh liên hệ</label>
        <div class="col-xs-9">
            {!! Form::file('image_admin', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <label for="logo_site" class="col-xs-3 control-label">Logo website</label>
        <div class="col-xs-9">
            {!! Form::file('logo_site', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::submit('Lưu thay đổi', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
    </div>

    {!! Form::close() !!}
</div>
@stop

@section('scripts')
    <script type="text/javascript" src="{!! asset('ckeditor/ckeditor.js') !!}"></script>
    <script type="text/javascript">
        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 100,
            filebrowserBrowseUrl: '{!! url($url) !!}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        CKEDITOR.replace( 'summary', config);

        config['height'] = 400;     

        CKEDITOR.replace( 'content', config);
    </script>
@stop