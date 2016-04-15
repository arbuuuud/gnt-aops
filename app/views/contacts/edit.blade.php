@extends('layouts.'.Auth::user()->roleString().'form')
@section('form-title')
Edit Data Kontak
@stop

@section('form-open')
{{ Form::model($contact, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array(Auth::user()->roleString().'.contacts.update', $contact->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route(Auth::user()->roleString().'.contacts.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to(Auth::user()->roleString().'/contacts/'.$contact->id)}}" class="btn red" data-method="delete" data-confirm="Are you sure you want to delete this entry?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('full_name', 'Nama:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('full_name', Input::old('full_name'), array('class'=>'form-control')) }}
        </div>
    </div>
  <div class="form-group">
    {{ Form::label('email', 'Email:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('phone_number', 'No. Tlp:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('phone_number', Input::old('phone_number'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('isAutomaticFollowUp', 'Metode Follow-up', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::select('isAutomaticFollowUp', $automaticFollowUp, null, array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Status:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::select('active', $active, null, array('class'=>'form-control')) }}
        </div>
  </div>
@stop