@extends('layouts.public')

@section('head-title')
{{$gallery->title}}
@stop

@section('css-style')
{{ HTML::style('css/unite-gallery.css') }}
{{ HTML::style('css/ug-theme-default.css') }}
@stop

@section('js-script')
{{ HTML::script('js/ug-common-libraries.js') }}
{{ HTML::script('js/ug-functions.js') }}
{{ HTML::script('js/ug-thumbsgeneral.js') }}
{{ HTML::script('js/ug-thumbsstrip.js') }}
{{ HTML::script('js/ug-touchthumbs.js') }}
{{ HTML::script('js/ug-panelsbase.js') }}
{{ HTML::script('js/ug-strippanel.js') }}
{{ HTML::script('js/ug-gridpanel.js') }}
{{ HTML::script('js/ug-thumbsgrid.js') }}
{{ HTML::script('js/ug-avia.js') }}
{{ HTML::script('js/ug-slider.js') }}
{{ HTML::script('js/ug-sliderassets.js') }}
{{ HTML::script('js/ug-touchslider.js') }}
{{ HTML::script('js/ug-zoomslider.js') }}
{{ HTML::script('js/ug-video.js') }}
{{ HTML::script('js/ug-gallery.js') }}
{{ HTML::script('js/ug-api.js') }}
{{ HTML::script('js/ug-theme-default.js') }}
@stop

@section('custom-js')
$("#gallery").unitegallery(); 
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-9">

    	<div class="page-header">
			<h3 class="page-title text-uppercase text-brown"><strong>{{ $gallery->title }}</strong></h3>
			<small>{{ $gallery->translateDate($gallery->created_at) }} | <a href="{{URL::to('kategori-galeri/'.$gallery->category->slug)}}" class="post-category"><strong>{{ $gallery->category->title }}</strong></a></small>
		</div>

    	<div id="gallery" style="display:none;">
    		@foreach($gallery->photos as $photo)
    		{{ HTML::image( $photo->image, $photo->title, array( 'data-image' => URL::to($photo->image), 'data-description' => $photo->title) ) }}
    		@endforeach
     	</div>
     	@if($gallery->social_status == 1)
     	<div class="addthis_sharing_toolbox"></div>
     	@endif

     	{{$gallery->content}}

     	@if($related_posts)
	     	<div class="page-header">
				<h3 class="text-brown">Galeri Foto {{$gallery->category->title}} Lainnya</h3>
			</div>

			@foreach ($related_posts as $gallery)
			<div class="post row">
	            <div class="post-media col-md-3">
	            	@foreach($gallery->photos as $photo)
						<a href="{{URL::to('galeri/'.$gallery->slug)}}">
							{{ HTML::image( $photo->image, $photo->title, array( 'data-description' =>  $photo->title, 'class' => 'img-responsive' ) ) }}
						</a>
						<?php break; ?>
					@endforeach
				</div>
	            <div class="post-body col-md-9">
	                <div class="post-date">{{ $gallery->translateDate($gallery->created_at) }}</div>
	                <h4 class="post-heading"><a href="{{URL::to('galeri/'.$gallery->slug)}}">{{$gallery->title}}</a></h4>
	            </div>
	        </div>
			@endforeach
		@endif

		@if($gallery->comment_status == 1)
		@include('includes.postcomment')
		@endif
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