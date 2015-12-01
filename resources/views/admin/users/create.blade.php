@extends('admin.layouts.master')

@section('main')

<div class="col-xs-12 boxed" style="margin-bottom: 20px;">
	<h3 class="form-group">Thêm người dùng.</h3>
	<hr>
	@include('front.elements.flash_notification')

	{!! Form::open(['route' => 'admin.users.create', 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) !!}
    @include('admin.users.template')
</div>
@stop