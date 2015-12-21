@extends('redac.categories.template')

@section('form')
    <h3>Chỉnh sửa chủ đề.</h3>
    <hr>
    {!! Form::model($category, ['route' => ['redac.category.edit', $category->id], 'method' => 'patch', 'role' => 'form']) !!}

    @include('front.elements.flash_notification')
@stop