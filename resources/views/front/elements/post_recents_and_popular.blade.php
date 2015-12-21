<div class="widget-posts  push-down-30">
    <h6>Popular / Recent</h6>
    <ul class="nav  nav-tabs">
        <li class="active">
            <a href="#recent-posts" data-toggle="tab"> 
                <span class="glyphicon  glyphicon-time"></span> &nbsp;Recent Posts 
            </a>
        </li>
        <li> 
            <a href="#popular-posts" data-toggle="tab"> 
                <span class="glyphicon  glyphicon-flash"></span> &nbsp;Popular Posts 
            </a> 
        </li>
    </ul>
                         
    <div class="tab-content">
        <div class="tab-pane  fade  in  active" id="recent-posts">
            @foreach ($postsRecents as $post)
                <div class="row push-down-10">
                    <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                        <img src="{!! asset(config('model.posts.path_folder_photo_post').$post->images) !!}" alt="Posts" class="img-post-sidebar">
                    </a>
                    <h5>
                        <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                            {!! $post->title !!}
                        </a>
                    </h5>
                    <span class="widget-posts__time">
                        {!! formatDateDiff($post->created_at) !!}
                    </span>
                </div>
            @endforeach
        </div>

        <div class="tab-pane  fade" id="popular-posts">

            @foreach ($postsPopular as $post)
                <div class="row push-down-10">
                    <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                        <img src="{!! asset(config('model.posts.path_folder_photo_post').$post->images) !!}" alt="Posts" class="img-post-sidebar">
                    </a>
                    <h5>
                        <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                            {!! $post->title !!}
                        </a>
                    </h5>
                    <span class="widget-posts__time">
                        {!! formatDateDiff($post->created_at) !!}
                    </span>
                </div>
            @endforeach
        </div>
    </div>
</div>