@extends('layouts.public')

@section('head-title')
Home
@stop

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-12" id="sidebar">
      @if(isset($message))
      {{$message}}
      @elseIf(isset($contactstring))
      <a href="{{URL::to('unsubscribeconfirm/'.$contactstring)}}" class="button">unsubscribe</a>
      @endIf
    </div>
  </div>
</div>
@stop