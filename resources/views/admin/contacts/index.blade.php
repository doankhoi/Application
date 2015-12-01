@extends('admin.layouts.master')

@section('main')
    <div class="row">
        <div class="col-xs-9">
            <h3>Tin nhắn</h3>
        </div>
        <div class="col-xs-3">
            <a href="javascript:void(0)" id="all-check-message" class="btn btn-primary btn-action pull-right" data-url="{!! route('admin.contacts.checkall') !!}">
                Duyệt toàn bộ
            </a>
        </div>
    </div>
    
    <hr>
    @foreach ($messages as $message)
        <div class="panel {!! $message->seen? 'panel-default' : 'panel-warning' !!}">
          <div class="panel-heading">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-lg-1">Tên</th>
                            <th class="col-lg-1">Email</th>
                            <th class="col-lg-1">Ngày viết</th>
                            <th class="col-lg-1">Đã xem</th>
                            <th class="col-lg-1"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-primary"><strong>{{ $message->name }}</strong></td>
                            <td>{!! Html::mailto($message->email, $message->email) !!}</a></td>
                            <td>{{ date('Y-m-d', strtotime($message->created_at)) }}</td>
                            @if($message->seen)
                                <td>
                                    <input type="checkbox" checked="checked" class="cb-seen" data-url="{!! route('admin.contacts.seen', ['id' => $message->id]) !!}">đã xem
                                </td>
                            @else
                                <td>
                                    <input type="checkbox" class="cb-seen" data-url="{!! route('admin.contacts.seen', ['id' => $message->id]) !!}">đã xem
                                </td>
                            @endif

                            <td>
                                <a href="javascript:void(0)" class="btn btn-danger btn-action">
                                    Xóa
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>    
            </div>
            <div class="panel-body">
                {{ $message->text }}
            </div>
        </div>
    @endforeach

    @include('front.elements.paginate', ['records' => $messages])
@stop