@extends('layouts.public')

@section('head-title')
Unsubcribe
@stop

@section('content')
<div class="container">

	  @if(isset($message))
      	<h3 class="text-center">{{$message}}</h3>
      @elseIf(isset($contactstring))
      	<h3 class="text-center">Untuk berhenti berlangganan, silahkan klik link dibawah ini.</h3>
      	<h3 class="testimonial-title text-center">
      		<a href="{{URL::to('unsubscribeconfirm/'.$contactstring)}}" class="button">
      			Unsubscribe
      		</a>
      	</h3>
      @endIf

</div>
@stop