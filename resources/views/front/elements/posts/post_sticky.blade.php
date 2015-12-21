<div class="boxed  sticky  push-down-45">
    <div class="meta">
        <img class="wp-post-image" src="{!! asset(config('model.posts.path_folder_photo_post').$post->images) !!}" alt="Blog image" width="748" height="324">
        <div class="meta__container">
            <div class="row">
                <div class="col-xs-12  col-sm-8">
                    <div class="meta__info">
                        <span class="meta__author">
                            <img src="{!! asset(config('model.user_info.path_folder_photo_user').$post->user->photo) !!}" alt="Meta avatar" width="30" height="30"> 
                            <a href="#">{!! $post->user->username !!}</a> in 
                            <a href="{!! route('website.posts.category',['id' => $post->category->id]) !!}">{!! $post->category->name !!}</a> 
                        </span>
                        <span class="meta__date">
                            <span class="glyphicon glyphicon-calendar"></span>
                            {!! formatDate($post->created_at) !!}
                        </span>
                    </div>
                </div>
                <div class="col-xs-12  col-sm-4">
                    <div class="meta__comments">
                        <span class="glyphicon glyphicon-comment"></span> &nbsp;
                        <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}#box-comment">
                            {!! $post->comments->count() !!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sticky__box">
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
    </div>
     
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="post-content--front-page">
                <h2 class="front-page-title">
                    <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                        {!! $post->title !!}
                    </a>
                </h2>
                <p>
                    {!! $post->summary !!}
                </p>
            </div>
            <div class="row">
                <div class="box-tag pull-right">
                    @foreach ($post->tags as $tag)
                    <a href="{!! route('website.posts.tag', ['tag' => $tag->tag]) !!}">
                        <span class="glyphicon glyphicon-tag"></span>
                        {!! $tag->tag !!}
                    </a>
                    @endforeach
                </div>
            </div>
            <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                <div class="read-more">
                    Đọc thêm
                    <div class="read-more__arrow">
                        <span class="glyphicon  glyphicon-chevron-right"></span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div> <!--End boxed-->