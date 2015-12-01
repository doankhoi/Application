@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-xs-9">
            <h3>Bình luận</h3>
        </div>
        <div class="col-xs-3">
            <div class="pull-right">
                {!! Form::open(['route' => 'admin.comments.checkall']) !!}
                    {!! Form::submit('Duyệt toàn bộ', ['class' => 'btn btn-primary', 'id' => 'check-all-comment']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <hr>
    @foreach ($comments as $comment)
        <div class="panel {!! $comment->seen? 'panel-default' : 'panel-warning' !!}">
          <div class="panel-heading">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Tác giả</th>
                            <th class="col-lg-1">Ngày viết</th>
                            <th class="col-lg-1">Thuộc bài viết</th>
                            <th class="col-lg-1">Đã duyệt</th>
                            <th class="col-lg-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-primary">
                                <strong>{{ $comment->user->role->title }}</strong>
                            </td>
                            <td>{{ date('Y-m-d', strtotime($comment->created_at)) }}</td>
                            <td>
                                <a href="{!! route('website.posts.show', ['id' => $comment->post->id]) !!}#box-comment">
                                    {!! $comment->post->title !!}
                                </a>
                            </td>
                            @if($comment->seen)
                                <td>
                                    <input type="checkbox" checked="checked" class="cb-seen" data-url="{!! route('admin.comments.seen', ['id' => $comment->id]) !!}">đã xem
                                </td>
                            @else
                                <td>
                                    <input type="checkbox" class="cb-seen" data-url="{!! route('admin.comments.seen', ['id' => $comment->id]) !!}">đã xem
                                </td>
                            @endif

                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger btn-action delete-item" data-url="{!! route('admin.comments.delete', ['id' => $comment->id]) !!}">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>    
            </div>
            <div class="panel-body">
                {{ $comment->content }}
            </div>
        </div>
    @endforeach

    @include('front.elements.paginate', ['records' => $comments])
@stop