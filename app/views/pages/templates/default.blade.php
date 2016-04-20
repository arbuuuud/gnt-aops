@extends('layouts.public')

@section('head-title')
{{$page->title}}
@stop

@section('content')
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