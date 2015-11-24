@extends('front.master')

@section('title', 'Trang chủ')

@section('content')
    @include('front.elements.flash_notification')
    
    @if(isset($posts))
        @foreach ($posts as $post) 
            
        @endforeach
    @endif

    @if (isset($posts))
        @include('front.elements.paginate', ['records' => $posts])
    @endif
@stop