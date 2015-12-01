@extends('redac.posts.template')

@section('form')
    <h3>Chỉnh sửa bài viết.</h3>
    <hr>
    {!! Form::model($post, ['route' => ['redac.posts.edit', $post->id], 'method' => 'patch', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}

    @include('front.elements.flash_notification')
@stop