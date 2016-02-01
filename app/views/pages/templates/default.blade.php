@extends('layouts.public')

@section('head-title')
{{$page->title}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h3 class="page-title text-center text-uppercase text-brown"> <strong>{{ $page->title }}</strong></h3>
    		</div>
			<p>{{ $page->content }}</p>
			@if($page->social_status == 1)
            <div class="addthis_sharing_toolbox"></div>
            @endif
            @if($page->comment_status == 1)
            @include('includes.postcomment')
            @endif
		</div>
	</div>
</div>
@stop