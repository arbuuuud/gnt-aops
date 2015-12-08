@extends('layouts.public')

@section('head-title')
Hasil Pencarian
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h3 class="page-title text-uppercase">Hasil Pencarian: <strong><span class="text-brown">{{$searchterm}}</span></strong></h3>
    			<p><em>Total terdapat <strong>{{$searchresults->getTotal()}}</strong> data, menunjukkan data <strong>{{$searchresults->getFrom()}}</strong> - <strong>{{$searchresults->getTo()}}</strong></em></p>
    		</div>
    		@if($searchresults->count())
				@foreach($searchresults as $item)
				<div class="post row">
		            <div class="post-media col-md-3">
		            	@if($item['image'])
		                <a href="{{asset($item['image'])}}" data-lightbox="image-{{$item['title']}}" data-title="{{$item['title']}}">
		                	{{ HTML::image( $item['image'], $item['title'], array( 'width' => '250', 'class' => 'post-object' ) ) }}
		                </a>
		                @else
		                  {{ HTML::image( 'img/default-pic.jpg', $item['title'], array( 'class' => 'post-object' ) ) }}
		                @endif
		            </div>
		            <div class="post-body col-md-9">
		                <span class="post-date">{{ $item['updated_at'] }}</span>
		                <h4 class="post-heading"><a href="{{URL::to($item['link'])}}">{{$item['title']}}</a></h4>
		                {{ $item['content'] }}
		                <p><span class="label label-danger">{{$item['type']}}</span></p>
		            </div>
		        </div>
		        @endforeach
		    @else
		    	<div class="alert alert-danger">
		    		Maaf tidak ditemukan hasil pencarian dengan kata kunci <em>"{{$searchterm}}"</em>, mohon mencoba kata kunci lainnya.
		    	</div>
		    	<form class="form" method="get" action="{{URL::to('search')}}">
		            <div class="input-group">
		              <input type="text" name="s" class="form-control" placeholder="Telusuri...">
		              <span class="input-group-btn">
		                <button class="btn btn-default" type="button">
		                    <i class="fa fa-search"></i>
		                </button>
		              </span>
		            </div><!-- /input-group -->
		        </form>
		    @endif

	        {{-- pagination --}}
	        <div class="text-center">
	        	{{ $searchresults->links() }}
	        </div>
		</div>
	</div>
</div>
@stop