@extends('front.master')

@section('title', $INFO_SITE->site_name.' - '.$post->title)

@section('content')
    <input type="hidden" id="url-post" data-url="{!! route('website.posts.show', ['id' => $post->id]) !!}">
    <div class="boxed  push-down-60">
        <div class="meta">
            <img class="wp-post-image" src="{!! asset(config('model.posts.path_folder_photo_post').$post->images) !!}" alt="Blog image">
            <div class="meta__container">
                <div class="row">
                    <div class="col-xs-12  col-sm-8">
                        <div class="meta__info">
                            <span class="meta__author">
                                <img src="{!! getImageAvatar($post->user) !!}" alt="Meta avatar" width="30" height="30"> 
                                <a href="#">
                                    {!! $post->user->username !!}
                                </a> in 
                                <a href="#">{!! $post->category->name !!}</a> 
                            </span>
                            <span class="meta__date">
                                <span class="glyphicon glyphicon-calendar"></span> &nbsp;
                                {!! formatDate($post->created_at) !!}
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12  col-sm-4">
                        <div class="meta__comments">
                            <span class="glyphicon glyphicon-comment"></span> &nbsp;
                            <a href="#box-comment">
                                {!! $post->comments->count()!!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
 
        <div class="row">
            <div class="col-xs-10  col-xs-offset-1  col-md-8  col-md-offset-2  push-down-60">
 
                <div class="post-content">
                    <h2>
                        {!! $post->title !!}
                    </h2>
                    <p>
                        <b>
                            {!! $post->summary !!}
                        </b>
                    </p>
                    <p>
                        {!! $post->content !!}
                    </p>
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
                </div>
                
                <div class="row">
                    <div class="col-xs-12  col-sm-6">
 
                        <div class="post-comments">
                            <a class="btn  btn-primary" href="#box-comment">
                                {!! $post->comments->count() !!} comments
                            </a>
                        </div>
 
                    </div>
                    <div class="col-xs-12  col-sm-6">
 
                        <div class="social-icons">
                            <a href="{!! $INFO_SITE->facebook !!}" class="social-icons__container"> 
                                <span class="zocial-facebook"></span> 
                            </a>
                            <a href="https://twitter.com/osbkca" class="social-icons__container"> 
                                <span class="zocial-twitter"></span> 
                            </a>
                            
                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count"></div>
                           
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12  col-sm-6">
                        <div class="post-author">
                            <h6>Tác giả bài viết</h6>
                            <hr>
                            <img src="{!! getImageAvatar($post->user) !!}" alt="Post author">
                            <h5>
                                <a href="#">{!! $post->user->username !!}</a>
                            </h5>
                            <span class="post-author__text">
                                {!! $post->user->description !!}
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-12  col-sm-6">
                        @include('front.elements.tags')
                    </div>
                </div>

                <div class="row">
                    <div>
                        <h6>Bình luận.</h6>
                        <br>
                        {!! Form::open(['route' => 'website.comment']) !!}
                            @include('front.elements.flash_notification')
                            {!! Form::textarea('content', null) !!}
                            <input type="hidden" name="post_id" value="{!! $post->id !!}"><br>
                            {!! Form::submit('Đăng bình luận', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
                <hr>
                <br>
                <div class="row push-down-15" id="box-comment">
                    @foreach ($post->comments as $comment)
                        <div class="row">
                            <div class="col-xs-1">
                                <img src="{!! getImageAvatar($comment->user) !!}" alt="avatar" class="img-responsive img-thumbnail" >
                            </div>
                            <div class="col-xs-11">
                                <p>
                                    <b>
                                        {!! $comment->user->username !!}
                                    </b>
                                    <span class="time-comment">
                                        {!! formatDateDiff($comment->created_at) !!}
                                    </span>
                                </p>
                                <p>
                                    {!! $comment->content !!}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="related-stories">
                    <h6>Các bài viết liên quan</h6>
                    <hr>
                    @foreach($relatedPost as $post)
                        <h5>
                            <span class="fa fw fa-circle"></span>
                            <a href="{!! route('website.posts.show', ['id' => $post->id]) !!}">
                                {!! $post->title !!}
                            </a>
                        </h5>
                    @endforeach
                </div>
 
            </div>
        </div>
    </div>

@stop

@section('script')
<script type="text/javascript" src="{!! asset('ckeditor/ckeditor.js') !!}"></script>
<script type="text/javascript">
        var config = {
            codeSnippet_theme: 'Monokai',
            language: '{{ config('app.locale') }}',
            height: 100,
            filebrowserBrowseUrl: '{!! url($url) !!}',
            toolbarGroups: [
                { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools' ] },
                { name: 'others' },
                //'/',
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                { name: 'styles' },
                { name: 'colors' }
            ]
        };

        CKEDITOR.replace( 'content', config);
</script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=259464497577015";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@stop