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
			@if($page->documents->count())
			<h3 class="text-brown">Dokumen Terkait</h3>
				<ul>
				@foreach($page->documents as $document)
					<li><a data-toggle="modal" data-target="#viewdoc_{{$document->id}}">{{$document->name}}</a></li>
					<!-- Modal -->
					<div class="modal fade" id="viewdoc_{{$document->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="modal-lable_{{$document->id}}">{{$page->title}} - {{$document->name}}</h4>
					      </div>
					      <div class="modal-body">
					        <iframe src = "{{URL::to('/ViewerJS/index.html#..'.$document->path)}}" width='100%' height='500' allowfullscreen webkitallowfullscreen></iframe>
					      </div>
					      <div class="modal-footer">
					        <a href="{{URL::to($document->path)}}" class="btn btn-primary pull-right margin-bottom"><i class="fa fa-cloud-download"></i> Download File</a>
					      </div>
					    </div>
					  </div>
					</div>
				@endforeach
				</ul>
			@endif
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