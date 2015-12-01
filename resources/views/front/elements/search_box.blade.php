<div class="search-panel">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
            {!! Form::open(['route' => 'website.search']) !!}
                {!! Form::text('search', null, ['class' => 'search-panel__form  js--search-panel-text', 'placeholder' => 'Gõ từ khóa tìm kiếm.']) !!}
                <p class="search-panel__text">
                    Nhấn Enter để thực hiện tìm kiếm. Nhấn Esc để thoát
                </p>
            {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>