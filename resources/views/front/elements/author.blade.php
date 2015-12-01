<div class="widget-author__image-container">
    <div class="widget-author__avatar--blurred">
        <img src="{!! asset(config('model.user_info.path_folder_photo_user').$author->photo) !!}" alt="Avatar image" width="90" height="90">
    </div>
    <img class="widget-author__avatar" src="{!! asset(config('model.user_info.path_folder_photo_user').$author->photo) !!}" alt="Avatar image" width="90" height="90">
</div>
<div class="row">
    <div class="col-xs-10  col-xs-offset-1">
        <h4>{!! $author->username !!}</h4>
        <p>
           {!! $author->description !!}
        </p>
    </div>
</div>