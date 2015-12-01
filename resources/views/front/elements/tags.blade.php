<div class="tags  widget-tags">
    <h6>Tags</h6>
    <hr>
    @foreach ($tags as $tag)
    	<a href="{!! route('website.posts.tag', ['tag' => $tag->tag]) !!}" class="tags__link">{!! $tag->tag!!}</a>
    @endforeach
</div>