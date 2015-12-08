@extends('layouts.public')

@section('head-title')
Galeri Video
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-9">

    		<div class="page-header">
    			<h3 class="page-title text-uppercase text-brown"><strong>Galeri Video Terbaru</strong></h3>
    		</div>

			<div class="row">
			@foreach($videos as $video)
				<div class="col-md-4">
		            <div class="thumbnail">
		            	@if($video->image)
		            	<a href="{{URL::to('video/'.$video->slug)}}">
		               		{{ HTML::image( $video->image, $video->title, array( 'data-description' =>  $video->title, 'class' => 'img-responsive' ) ) }}
			            </a>
			            @endif
		              <div class="caption">
		                <div class="post-date">{{ $video->translateDate($video->created_at) }}</div>
		                <h4 class="post-heading">
		                	<a href="{{URL::to('video/'.$video->slug)}}">{{$video->title}}</a>
		                </h4>
		              </div>
		            </div>
		        </div>
			@endforeach
			</div>

	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $videos->links() }}
	        </div>
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