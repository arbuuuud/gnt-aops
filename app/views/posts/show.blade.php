@extends('layouts.public')

@section('head-meta')
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{URL::to('artikel/'.$post->slug)}}" />
<meta property="og:title" content="{{$post->title}}" /> 
<meta property="og:description" content="{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}" />
@if($post->image)<meta property="og:image" content="{{asset($post->image)}}" />@endif
@stop

@section('head-title')
{{$post->title}}
@stop

@section('content')

<div id="menu-popup">
    <ul id="menu-popup-items">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/kategori/uncategorized')}}">Article</a></li>
    </ul>
    <div id="menu-popup-close">
        X
    </div>
</div>

<div id="article-top-bar" class="container-fluid">
    <div class="row">
        <div class="col-sm-11 col-xs-8">
          <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
        </div>
        <div id="nav-menu" class="col-sm-1 col-xs-4">
            <div class="menu-text">
                Menu
            </div>
            <div class="menu-icon">
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
    	<div class="col-sm-7 col-xs-12">
    		<div class="post">
    			<small>{{ $post->translateDate($post->created_at) }} | <a href="{{URL::to('kategori/'.$post->category->slug)}}" class="post-category"><strong>{{ $post->category->title }}</strong></a></small>
				<h2 class="post-title"><strong>{{ $post->title }}</strong></h2>
				@if($post->image)
	           		{{ HTML::image( $post->image, $post->title, array( 'class' => 'img-responsive img-thumbnail' ) ) }}
	            @endif
				<p>{{ $post->content }}</p>
                @if($post->social_status == 1)
                <div class="addthis_sharing_toolbox"></div>
                @endif

                @if($post->comment_status == 1)
                @include('includes.postcomment')
                @endif
    		</div>
        </div>

        <div class="col-sm-5 col-xs-12">
            @if($related_posts)
            <div class="related-posts">
                <h3 class="related-posts-title">{{$post->category->title}} Lainnya</h3>
                <ul>
                    @foreach ($related_posts as $related_post)
                    <li class="row">
                        <div class="col-sm-4">
                            <img src="{{$related_post->image}}" class="img-responsive">
                        </div>
                        <h5 class="post-heading"><a href="{{URL::to('posts/'.$related_post->slug)}}">{{$related_post->title}}</a></h5>
                        <h5><a href="{{URL::to('posts/'.$related_post->slug)}}">{{ date('d F Y, G:h:s', strtotime($related_post->created_at))}}</a></h5>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
	</div>
</div>
@stop