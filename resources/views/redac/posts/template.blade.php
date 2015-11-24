@extends('admin.layouts.master')

@section('main')
    <div class="col-sm-12">
        @yield('form')
        <div class="form-group checkbox pull-right">
            <label>
                {!! Form::checkbox('is_active') !!}
                Published.
            </label>
        </div>

        <div class="form-group">
            <label for="title">Tiêu đề</label>
            {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control']) !!}
        </div>

        <div class="form-group {!! $errors->has('slug') ? 'has-error' : '' !!}">
            <label for="slug">Link: </label>
            {!! url('/') . '/website/' . Form::text('slug', null, ['id' => 'permalien']) !!}
        </div>

        <div class="form-group">
            <label for="category_id">Nhóm bài viết</label>
            {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="type">Loại bài viết</label>
            {!! Form::select('type', ['' => 'Chọn một nhóm'] + config('model.posts.type'), null, ['class' => 'form-control', 'id' => 'type-post']) !!}
        </div>

        <div class="form-group box-quote" style="display: none;">
            <label for="quote">Quote</label>
            {!! Form::text('quote', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="summary">Tóm tắt nội dung</label>
            {!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="content">Nội dung</label>
            {!! Form::textarea('content', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            <label for="tags">Tags</label>
            {!! Form::text('tags', null, ['class' => 'form-control']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Hoàn tất', ['class' => 'btn btn-primary col-xs-3 col-xs-offset-5']) !!}
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

        $("#title").keyup(function(){
                var str = sansAccent($(this).val());
                str = str.replace(/[^a-zA-Z0-9\s]/g,"");
                str = str.toLowerCase();
                str = str.replace(/\s/g,'-');
                $("#permalien").val(str);        
        });
    </script>
@stop