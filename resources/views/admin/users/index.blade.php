@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-xs-12 col-md-9">
            <h3>Quản lý người dùng.</h3>
        </div>
        <div class="col-xs-12 col-md-3">
            <a href="{!! route('admin.users.create') !!}" class="btn btn-primary btn-action pull-right">
                Tạo người dùng
            </a>
        </div>
    </div>
    <hr>

    @include('front.elements.flash_notification')
    <div id="tri" class="row btn-group btn-group-sm">
        <a href="{!! route('admin.users.index') !!}" type="button" name="total" class="btn btn-default}}">Tất cả
          <span class="badge">{!!  $counts['total'] !!}</span>
        </a>
        @foreach ($roles as $role)
          <a href="{!! route('admin.users.sort', ['slug' => $role->slug]) !!}" type="button" name="{!! $role->slug !!}" class="btn btn-default">
            {!! $role->title !!} 
            <span class="badge">{!! $counts[$role->slug] !!}</span>
          </a>
        @endforeach
    </div>

    <div class="row pull-right">
        {!! Form::open(['route' => 'admin.users.checkall']) !!}
            {!! Form::submit('Duyệt toàn bộ', ['class' => 'btn btn-primary', 'id' => 'check-all-user']) !!}
        {!! Form::close() !!}
    </div>

    <table class="table">
        <thead>
            <th>Tên</th>
            <th>Quyền</th>
            <th>Đã duyệt</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="color: blue;">{!! $user->username !!}</td>
                    <td>{!! $user->role->title !!}</td>

                    @if($user->seen)
                        <td><input type="checkbox" checked="checked" class="cb-seen" data-url="{!! route('admin.users.seen', ['id' => $user->id]) !!}">đã xem</td>
                    @else
                        <td><input type="checkbox" class="cb-seen" data-url="{!! route('admin.users.seen', ['id' => $user->id]) !!}">đã xem</td>
                    @endif

                    <td>
                        <a href="{!! route('admin.users.show',['id' => $user->id]) !!}" class="btn btn-warning btn-action">
                            View
                        </a>
                        <a href="{!! route('admin.users.edit', ['id' => $user->id ]) !!}" class="btn btn-success btn-action">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-danger btn-action delete-item" data-url="{!! route('admin.users.delete', ['id' => $user->id]) !!}">
                            Delete
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @include('front.elements.paginate', ['records' => $users])
@stop