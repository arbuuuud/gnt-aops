@extends('layouts.public')

@section('head-title')
Galeri Foto {{$member->name}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">

    		<div class="page-header">
    			<h3 class="page-title text-uppercase"><strong>Galeri Foto <span class="text-brown">{{ $member->name }}</span></strong></h3>
    		</div>

    		<div class="row">
			@foreach($galleries as $gallery)
			<div class="col-md-4">
	          
	            <div class="thumbnail">
	            	@foreach($gallery->photos as $photo)
						<a href="{{URL::to('galeri/'.$gallery->slug)}}">
							{{ HTML::image( $photo->image, $photo->title, array( 'data-description' =>  $photo->title, 'class' => 'img-responsive' ) ) }}
						</a>
						<?php break; ?>
					@endforeach
	              <div class="caption">
	                <div class="post-date">{{ $gallery->translateDate($gallery->created_at) }}</div>
	                <h4 class="post-heading"><a href="{{URL::to('galeri/'.$gallery->slug)}}">{{$gallery->title}}</a></h4>
	              </div>
	            </div>
	          </a>
	        </div>
	        @endforeach
	    	</div>

	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $galleries->links() }}
	        </div>
		</div>
	</div>
</div>
@stop