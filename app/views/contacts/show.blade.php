@extends('layouts.public')

@section('head-meta')
<meta property="og:type" content="article" /> 
<meta property="og:url" content="{{URL::to('artikel/'.$post->slug)}}" />
<meta property="og:title" content="{{$post->title}}" /> 
<meta property="og:description" content="{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}" />
@if($post->image)<meta property="og:image" content="{{asset($post->image)}}" />@endif
@stop

@section('head-title')
{{$post->title}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="post">
    			<small>{{ $post->translateDate($post->created_at) }} | <a href="{{URL::to('kategori/'.$post->category->slug)}}" class="post-category"><strong>{{ $post->category->title }}</strong></a></small>
				<h2 class="post-title"><strong>{{ $post->title }}</strong></h2>
				@if($post->image)
	           		{{ HTML::image( $post->image, $post->title, array( 'class' => 'img-responsive img-thumbnail featured-image' ) ) }}
	            @endif
				<p>{{ $post->content }}</p>
                @if($post->social_status == 1)
                <div class="addthis_sharing_toolbox"></div>
                @endif
                @if($post->documents->count())
                <h3 class="text-brown">Dokumen Terkait</h3>
                <ul>
                @foreach($post->documents as $document)
                    <li><a data-toggle="modal" data-target="#viewdoc_{{$document->id}}">{{$document->name}}</a></li>
                    <!-- Modal -->
                    <div class="modal fade" id="viewdoc_{{$document->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modal-lable_{{$document->id}}">{{$post->title}} - {{$document->name}}</h4>
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
    		</div>

            @if($related_posts)
            <div class="related-posts">
                <h3 class="text-brown">{{$post->category->title}} Lainnya</h3>
                <ul>
                    @foreach ($related_posts as $related_post)
                    <li><h5 class="post-heading"><a href="{{URL::to('posts/'.$related_post->slug)}}">{{$related_post->title}}</a></h5></li>
                    @endforeach
                </ul>
            </div>
    		@endif

            @if($post->comment_status == 1)
            @include('includes.postcomment')
            @endif
        </div>
	</div>
</div>
@stop