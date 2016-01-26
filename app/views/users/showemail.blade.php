@extends('layouts.adminform')

@section('form-title')
Show Email
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array(Auth::user()->roleString().'.sendemailmanual'), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('member.outbox', 'Back To Outbox', null,array('class' => 'btn btn-default')) }}
@stop

@section('form-left')
<div class="form-body form-horizontal">
  @include('emails.templates.'.$urlEmail)
</div>
@stop