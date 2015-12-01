@extends('admin.layouts.master')

@section('main')
    <h3>Dashboard</h3>
    <hr>

    <div class="row">
        @include('admin.elements.panel', ['color' => 'primary', 'icon' => 'envelope', 'nbr' => $nbrMessages, 'name' => 'Tin nhắn mới !', 'total' => 'Tin nhắn.', 'url' => route('admin.contacts.index')])

        @include('admin.elements.panel', ['color' => 'green', 'icon' => 'user', 'nbr' => $nbrUsers, 'name' => 'Người dùng mới !', 'total' => 'Người dùng.', 'url' => route('admin.users.index')])

        @include('admin.elements.panel', ['color' => 'red', 'icon' => 'pencil', 'nbr' => $nbrPosts, 'name' => 'Bài viết mới !', 'total' => 'Bài viết.', 'url' => route('redac.posts.index')])
        
        @include('admin.elements.panel', ['color' => 'yellow', 'icon' => 'comment', 'nbr' => $nbrComments, 'name' => 'Bình luận mới !', 'total' => 'Bình luận.', 'url' => route('admin.comments.index')])
    </div>
@stop