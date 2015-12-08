@extends('layouts.public')

@section('head-title')
Blog {{$member->name}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h3 class="page-title text-uppercase"><strong>Blog <span class="text-brown">{{ $member->name }}</span></strong></h3>
    		</div>
			@foreach($posts as $post)
			<div class="post row">
				@if($post->image)
	            <div class="post-media col-md-4">
	                <a href="{{$post->image}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
	                	{{ HTML::image( $post->image, $post->title, array( 'width' => '250', 'class' => 'post-object' ) ) }}
	                </a>
	            </div>
	            @endif
	            <div class="post-body {{ $post->image ? 'col-md-8' : 'col-md-12' }}">
	                <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
	                <h4 class="post-heading"><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></h4>
	                {{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}
	            </div>
	        </div>
	        @endforeach

	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $posts->links() }}
	        </div>
		</div>
	</div>
</div>
@stop