@extends('layouts.public')

@section('head-title')
Galeri Foto
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-9">

    		<div class="page-header">
    			<h3 class="page-title text-uppercase text-brown"><strong>Galeri Foto Terbaru</strong></h3>
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
		                <h4 class="post-heading">
		                	<a href="{{URL::to('galeri/'.$gallery->slug)}}">{{$gallery->title}}</a>
		                </h4>
		              </div>
		            </div>
		        </div>
			@endforeach
			</div>


	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $galleries->links() }}
	        </div>
		</div>
		<div class="col-md-3">
			<div class="page-header">
    			<h3 class="page-title text-uppercase text-brown"><strong>Kategori Foto</strong></h3>
    		</div>		
	    	<ul>
	    	@foreach($gallerycategories as $category)
	            <li>
	            	<h4 class="post-heading">
	            		<a href="{{URL::to('kategori-galeri/'.$category->slug)}}">{{$category->title}}</a>
	            	</h4>
	            </li>
			@endforeach
			</ul>
		</div>
	</div>
</div>
@stop