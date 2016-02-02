@extends('layouts.public')

@section('head-title')
Unsubcribe
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-sm-12">
          <h1 class="testimonial-title text-center">Apakah Anda Yakin Ingin Berhenti Berlangganan Newsletter?</h1>
          <p>Sebelum Anda berhenti, kami mempunyai tawaran terakhir berupa produk dengan harga yang menarik untuk Anda!</p>
      </div>
    </div>

	  <div id="product-list">
	    <div class="row">
	       <div class="col-sm-4 text-center">
	        {{ HTML::image( 'img/product.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
	        <p><strong>GNT FIBER @ 6 sachet</strong></p>
	        <p>Harga: Rp. 120.000</p>
	      </div>
	      <div class="col-sm-4 text-center">
	        {{ HTML::image( 'img/product-2.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
	        <p><strong>GNT FIBER @ 15 sachet</strong></p>
	        <p>Harga: Rp. 280.000</p>
	      </div>
	      <div class="col-sm-4 text-center">
	        {{ HTML::image( 'img/product-3.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
	        <p><strong>GNT FIBER @ 30 sachet</strong></p>
	        <p>Harga: Rp. 500.000</p>
	      </div>
	    </div>
	  </div>

	  @if(isset($message))
	  	<div class="alert alert-success">
      		<h3 class="text-center">{{$message}}</h3>
      	</div>
      @elseIf(isset($contactstring))
      	<div class="alert alert-warning">
	      	<h3 class="text-center">Untuk berhenti berlangganan, silahkan klik link dibawah ini.</h3>
	      	<h3 class="testimonial-title text-center">
	      		<a href="{{URL::to('unsubscribeconfirm/'.$contactstring)}}" class="button">
	      			Unsubscribe
	      		</a>
	      	</h3>
	    </div>
      @endIf

</div>
@stop