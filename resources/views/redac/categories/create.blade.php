@extends('redac.categories.template')

@section('form')
    <h3>Thêm chủ đề.</h3>
    <hr>
    {!! Form::open(['route' => 'redac.category.create', 'role' => 'form']) !!}

    @include('front.elements.flash_notification')
@stop