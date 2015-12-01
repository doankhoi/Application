@extends('front.home')
@section('title', 'Contact')

@section('contentLeft')
    <div class="boxed  push-down-45">
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1">
                <div class="contact">
                    <h2>Liên hệ</h2>
                    <p class="contact__text">
                        Nếu bạn có bất kỳ đóng góp, ý kiến về website hãy gửi phản hồi về cho ChickenElectric bằng việc hoàn thiện form bên dưới. Chúng tôi sẽ trả lời câu hỏi của bạn sớm nhất có thể.
                    </p>
                    {!! Form::open(['route' => 'website.contact.index']) !!}
                        @include('front.elements.flash_notification')
                        <p>
                            <span class="contact__obligatory">
                                Các trường có dấu * là bắt buộc.
                            </span>
                        </p>
                        <div class="row">
                            <div class="col-xs-6">
                                {!! Form::text('name', null, ['placeholder' => 'Tên *']) !!}
                            </div>
                            <div class="col-xs-6">
                                {!! Form::text('email', null, ['placeholder' => 'Email *']) !!}
                            </div>
                            <div class="col-xs-12">
                                {!! Form::textarea('text', null, ['rows' => 6, 'placeholder' => 'Tin nhắn *']) !!}
                            </div>
                            <div class="col-xs-3 col-xs-offset-4">
                                {!! Form::submit('Gửi', ['class' => 'btn btn-default']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop