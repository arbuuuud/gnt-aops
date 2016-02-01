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
<div class="container">
    <div class="row">
    	<div class="col-md-12">
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
    		</div>
        </div>
	</div>
    <div class="row">
        <div class="col-md-12">
            @if($related_posts)
            <div class="related-posts">
                <h3 class="text-green">{{$post->category->title}} Lainnya</h3>
                <ul>
                    @foreach ($related_posts as $related_post)
                    <li><h5 class="post-heading"><a href="{{URL::to('posts/'.$related_post->slug)}}">{{$related_post->title}}</a></h5></li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if($post->comment_status == 1)
            @include('includes.postcomment')
            @endif
        </div>
    </div>
</div>
@stop