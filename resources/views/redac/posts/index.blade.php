@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <h3>Quản lý bài viết.</h3>
        </div>
        <div class="col-xs-12 col-md-3">
            <a href="{!! route('redac.posts.create') !!}" class="btn btn-primary btn-action pull-right">
                Tạo bài viết mới
            </a>
        </div>
    </div>
    <hr>

    @include('front.elements.flash_notification')
    <table class="table">
        <thead>
            <th>Tiêu đề</th>
            <th>Ngày tạo</th>
            <th>Tác giả</th>
            <th>Published</th>
            <th>Đã xem</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>{!! $post->title !!}</td>
                    <td>{!! date('Y-m-d', strtotime($post->created_at)) !!}</td>
                    <td>{!! $post->user->role->title !!}</td>
                    @if($post->is_active)
                        <td>
                            <input type="checkbox" checked="checked" id="cb-published" data-url="{!! route('redac.posts.published', ['idPost' => $post->id]) !!}"> 
                            published
                        </td>
                    @else
                        <td>
                            <input type="checkbox" id="cb-published" data-url="{!! route('redac.posts.published', ['idPost' => $post->id]) !!}"> 
                            published
                        </td>
                    @endif

                    @if($post->seen)
                        <td><input type="checkbox" checked="checked" class="cb-seen" data-url="{!! route('redac.posts.seen', ['idPost' => $post->id]) !!}">đã xem</td>
                    @else
                        <td><input type="checkbox" class="cb-seen" data-url="{!! route('redac.posts.seen', ['idPost' => $post->id]) !!}">đã xem</td>
                    @endif

                    <td>
                        <a href="{!! route('website.posts.show',['id' => $post->id]) !!}" class="btn btn-warning btn-action">
                            View
                        </a>
                        <a href="{!! route('redac.posts.edit', ['id' => $post->id ]) !!}" class="btn btn-success btn-action">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-action delete-item" data-url="{!! route('redac.posts.delete', ['idPost' => $post->id]) !!}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('front.elements.paginate', ['records' => $posts])
@stop