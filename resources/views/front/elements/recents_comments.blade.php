<div class="widget-recent-comments  push-down-30">
    <h6>Recent Comments</h6>
    <ul>
        @foreach ($commentsRecents as $comment)
            <li>
                {!! $comment->user->username !!} đã bình luận trên
                <a href="{!! route('website.posts.show', ['id' => $comment->post->id]) !!}">
                    {!! $comment->post->title !!}
                </a>
                <br/>
            </li> 
        @endforeach 
    </ul>
</div>