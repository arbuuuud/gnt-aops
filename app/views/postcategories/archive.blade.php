@extends('layouts.public')

@section('head-title')
{{$category->title}}
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
    	<div class="col-md-12">
    		<div class="page-header">
    			<h2 class="page-title text-uppercase text-green"><strong>{{ $category->title }}</strong>
				<div class="datepicker-container">
					{{ Form::open(array('class' => 'form-bordered form-inline', 'route' => array('admin.pages.update'))) }}
					<div class="form-body">
						<div class="input-group margin-bottom-sm">
							<?php $shownDate = Request::segment(3) ? Request::segment(3) : date('d M Y') ?>
							{{ Form::text('created_at', Helpers::translateDate($shownDate), array('class'=>'form-control form_datetime archive-datepicker')) }}
							<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
						</div>
					</div>
					{{ Form::close() }}
				</div>
    			</h3>
    		</div>
    		<div class="row">
	    		@if($posts->count() > 0)
					@foreach($posts as $post)
					<div class="col-sm-4 col-xs-12 article-archive-item">
						<div class="post row">
				            <div class="post-media col-sm-12">
				            	@if($post->image)
				                <a href="{{asset($post->image)}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
				                	{{ HTML::image( $post->image, $post->title, array( 'width' => '250', 'class' => 'post-object' ) ) }}
				                </a>
				                @else
				                	{{ HTML::image( 'img/default-pic.jpg', $post->title, array( 'width' => '250', 'class' => 'post-object' ) ) }}
				                @endif
				            </div>
				            <div class="post-body col-sm-12">
				                <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
				                <div class="addthis_toolbox addthis_default_style" addthis:title="{{$post->title}}" addthis:description="{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}" addthis:url="{{URL::to('posts/'.$post->slug)}}" style="display:inline-block;margin-left:10px;">
				                  <a class="addthis_button_compact"></a>
				                  <a class="addthis_counter addthis_bubble_style"></a>
				                </div>
				                <h4 class="post-heading"><a href="{{URL::to('posts/'.$post->slug.'#disqus-thread')}}">{{$post->title}}</a></h4>
				                <h5>{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}</h5>
				            </div>
				        </div>
			    	</div>
			        @endforeach
			    @else
			    <p class="text-center">Maaf tidak ada berita yang ditemukan, mohon mencoba tanggal lainnya.</p>
			    @endif
			</div>

		</div>

		<div class="row">

	        {{-- pagination --}}
	        <div class="col-sm-12 text-center">
	        	{{ $posts->links() }}
	        </div>

		</div>
	</div>
</div>
@stop