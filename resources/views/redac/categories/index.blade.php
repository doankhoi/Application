@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <h3>Quản lý chủ đề.</h3>
        </div>
        <div class="col-xs-12 col-md-3">
            <a href="{!! route('redac.category.create') !!}" class="btn btn-primary btn-action pull-right">
                Tạo chủ đề mới
            </a>
        </div>
    </div>
    <hr>

    @include('front.elements.flash_notification')
    <table class="table">
        <thead>
            <th>Tiêu đề</th>
            <th>Ngày tạo</th>
            @if (session('status') === "admin")
                <th>Published</th>
            @endif
            <th></th>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{!! $category->name !!}</td>
                    <td>{!! date('Y-m-d', strtotime($category->created_at)) !!}</td>
                    @if(session('status') === "admin")
                        @if($category->is_active)
                            <td>
                                <input type="checkbox" checked="checked" id="cb-published-cate" data-url="{!! route('redac.category.published', ['idCate' => $category->id]) !!}"> 
                                published
                            </td>
                        @else
                            <td>
                                <input type="checkbox" id="cb-published-cate" data-url="{!! route('redac.category.published', ['idCate' => $category->id]) !!}"> 
                                published
                            </td>
                        @endif
                    @endif

                    <td>
                        <a href="{!! route('website.posts.category',['id' => $category->id]) !!}" class="btn btn-warning btn-action">
                            View
                        </a>
                        <a href="{!! route('redac.category.edit', ['id' => $category->id ]) !!}" class="btn btn-success btn-action">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-action delete-item" data-url="{!! route('redac.category.delete', ['idCate' => $category->id]) !!}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('front.elements.paginate', ['records' => $categories])
@stop