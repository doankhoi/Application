<div class="widget-categories  push-down-30">
    <h6>Chuyên mục</h6>
    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{!! route('website.posts.category', ['id' => $category->id]) !!}">
                    {!! $category->name !!} &nbsp; 
                    <span class="widget-categories__text">({!! $category->posts->count() !!})</span> 
                </a>
            </li>
        @endforeach                   
    </ul>
</div>