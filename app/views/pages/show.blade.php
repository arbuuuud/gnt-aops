@extends('layouts.public')

@section('head-title')
{{$page->title}}
@stop

@section('content')
	<h2>{{ $page->title }}</h2>
	<p>{{ $page->content }}</p>
@stop

@section('sidebar')
    <p>This is appended to the master sidebar.</p>
@stop