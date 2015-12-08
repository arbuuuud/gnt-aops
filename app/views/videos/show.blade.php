@extends('layouts.public')

@section('head-title')
{{$video->title}}
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">

    	<div class="page-header">
			<h3 class="page-title text-uppercase text-brown"><strong>{{ $video->title }}</strong></h3>
			<small>{{ $video->translateDate($video->created_at) }} | <a href="{{URL::to('kategori-video/'.$video->category->slug)}}" class="post-category"><strong>{{ $video->category->title }}</strong></a></small>
		</div>

		<video id="MY_VIDEO_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" width="100%" height="500" data-setup="{}">
          <source src="{{asset($video->file)}}" type='video/mp4'>
          <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
        </video>
        @if($video->social_status == 1)
     	<div class="addthis_sharing_toolbox"></div>
     	@endif

     	{{$video->content}}

     	@if($related_posts)
	     	<div class="page-header">
				<h3 class="text-brown">Galeri Video {{$video->category->title}} Lainnya</h3>
			</div>

			@foreach ($related_posts as $video)
			<div class="post row">
	            <div class="post-media col-md-3">
	            	@if($video->image)
	            	<a href="{{URL::to('video/'.$video->slug)}}">
	               		{{ HTML::image( $video->image, $video->title, array( 'data-description' =>  $video->title, 'class' => 'img-responsive' ) ) }}
		            </a>
		            @endif
				</div>
	            <div class="post-body col-md-9">
	                <div class="post-date">{{ $video->translateDate($video->created_at) }}</div>
	                <h4 class="post-heading"><a href="{{URL::to('video/'.$video->slug)}}">{{$video->title}}</a></h4>
	            </div>
	        </div>
			@endforeach
		@endif

		@if($video->comment_status == 1)
		@include('includes.postcomment')
		@endif
    </div>
    <div class="col-md-3">
		<div class="page-header">
			<h3 class="page-title text-uppercase text-brown"><strong>Kategori Video</strong></h3>
		</div>		
    	<ul>
    	@foreach($videocategories as $category)
            <li>
            	<h4 class="post-heading">
            		<a href="{{URL::to('kategori-video/'.$category->slug)}}">{{$category->title}}</a>
            	</h4>
            </li>
		@endforeach
		</ul>
	</div>
  </div>
</div>
@stop