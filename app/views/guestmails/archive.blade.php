@extends('layouts.public')

@section('head-title')
Surat Pembaca
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">

    		<a href="{{route('surat.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tulis Surat</a>
    		
    		<div class="page-header">
    			<h3 class="page-title text-uppercase text-brown"><strong>Surat Pembaca</strong></h3>
    		</div>

    		@foreach($guestmails as $post)
	          <div class="post row">
	            <div class="post-body col-md-9">
	                <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
	                <div class="addthis_native_toolbox" style="display:inline-block;margin-left:10px;"></div>
	                <span class="post-author">Pengirim: <strong>{{$post->name}}</strong>, {{$post->city}}</span>
	                <h4 class="post-heading"><a href="{{URL::to('surat/'.$post->id)}}">{{$post->title}}</a></h4>
	                {{ str_limit(strip_tags($post->content), 300) }}
	            </div>
	          </div>
	        @endforeach

	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $guestmails->links() }}
	        </div>
		</div>
	</div>
</div>
@stop