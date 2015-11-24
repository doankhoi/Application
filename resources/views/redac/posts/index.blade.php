@extends('admin.layouts.master')

@section('main')
    <h3>Quản lý bài viết.</h3>
    <hr>

    @include('front.elements.flash_notification')
    <table class="table">
        <thead>
            <th>Stt</th>
            <th>Tiêu đề</th>
            <th>Published</th>
            <th>Đã xem</th>
            <th></th>
        </thead>
        <tbody>
            <?php $stt = 1;?>
            @foreach ($posts as $post)
                <tr>
                    <td>{!! $stt !!}</td>
                    <td>{!! $post->title !!}</td>
                    @if($post->is_active)
                        <td><input type="checkbox" checked="checked"> published</td>
                    @else
                        <td><input type="checkbox"> published</td>
                    @endif

                    @if($post->seen)
                        <td><input type="checkbox" checked="checked">đã xem</td>
                    @else
                        <td><input type="checkbox">đã xem</td>
                    @endif

                    <td>
                        <a href="#" class="btn btn-warning btn-action">View</a>
                        <a href="#" class="btn btn-success btn-action">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-action">Delete</a>
                    </td>
                </tr>
                <?php $stt++; ?>
            @endforeach
        </tbody>
    </table>

    @include('front.elements.paginate', ['records' => $posts])
@stop