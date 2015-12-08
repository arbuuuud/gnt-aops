@extends('layouts.public')

@section('head-title')
Sitemap
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h3 class="page-title text-center text-uppercase text-brown"> <strong>Sitemap</strong></h3>
    		</div>
			<p>{{ $sitemap }}</p>
		</div>
	</div>
</div>
@stop