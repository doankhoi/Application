@extends('redac.posts.template')

@section('form')
	<h3>Thêm bài viết.</h3>
	<hr>
	{!! Form::open(['route' => 'redac.posts.create', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}

	@include('front.elements.flash_notification')
@stop