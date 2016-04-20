@extends('layouts.public')

@section('head-title')
{{$page->title}}
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
    			<h3 class="page-title text-center text-uppercase text-green"> <strong>{{ $page->title }}</strong></h3>
    		</div>
			<p>{{ $page->content }}</p>
		</div>
	</div>
</div>
@stop