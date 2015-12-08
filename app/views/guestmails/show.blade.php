@extends('layouts.public')

@section('head-meta')
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{URL::to('surat/'.$guestmail->id)}}" />
<meta property="og:title" content="{{$guestmail->title}}" /> 
<meta property="og:description" content="{{ str_limit(strip_tags($guestmail->content), 300) }}" />
@stop

@section('head-title')
{{$guestmail->title}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="panel">
    			<div class="panel-heading">
    				{{ $guestmail->translateDate($guestmail->created_at) }}
    				<div class="pull-right">
    					<div class="addthis_sharing_toolbox" style="margin:0;"></div>
    				</div>
    			</div>
				<div class="panel-body">
					<div class="post">
						<h2><strong>{{ $guestmail->title }}</strong></h2>
						<p>{{ $guestmail->content }}</p>
						<hr>
						<dl class="dl-horizontal">
							<dt>Nama:</dt>
							<dd>{{$guestmail->name}}</dd>
							<dt>Alamat:</dt>
							<dd>{{$guestmail->address}}</dd>
							<dt>Kota:</dt>
							<dd>{{$guestmail->city}}</dd>
							<dt>No. Tlp:</dt>
							<dd>{{$guestmail->phone}}</dd>
						</dl>
		    		</div>
				</div>
    		</div>
    	</div>
	</div>
</div>
@stop