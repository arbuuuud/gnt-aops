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

			<div class="text-center socialmedia-content row">
				<div class="col-md-6">
					<h3>Follow MPR.go.id on Facebook</h3>
					<div class="fb-page" data-href="https://www.facebook.com/wwwMPRgoid" data-width="500" data-height="500" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
						<div class="fb-xfbml-parse-ignore">
							<blockquote cite="https://www.facebook.com/wwwMPRgoid">
								<a href="https://www.facebook.com/wwwMPRgoid">MPRgoid</a>
							</blockquote>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<h3>Follow MPR.go.id on Twitter</h3>
					<a class="twitter-timeline" href="https://twitter.com/MPRgoid" data-widget-id="589673652959842304">Tweets by @MPRgoid</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</div>
			</div>
		</div>
	</div>
</div>
@stop