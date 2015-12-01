@extends('front.home')
@section('title', 'Trang chủ')

@section('contentLeft')
    
    @include('front.elements.flash_notification')

    @if(isset($postSticky))
        @include('front.elements.posts.post_sticky', ['post' => $postSticky])
    @endif

    @if(isset($posts))
        @foreach ($posts as $post) 
            @if($post->type == 1)
                @include('front.elements.posts.post_normal', ['post' => $post])
            @elseif ($post->type == 3)
                @include('front.elements.posts.post_video', ['post' => $post])
            @elseif ($post->type == 4)
                @include('front.elements.posts.post_quote', ['post' => $post])
            @endif
        @endforeach
    @endif

    @if (isset($posts))
        @include('front.elements.paginate', ['records' => $posts])
    @endif
@stop