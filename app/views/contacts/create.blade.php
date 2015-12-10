@extends('layouts.adminform')

@section('form-title')
Contacts
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.contacts.store'), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.contacts.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('first_name', 'First Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('first_name', Input::old('first_name'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('last_name', Input::old('last_name'), array('class'=>'form-control')) }}
		    </div>
	</div>
  <div class="form-group">
    {{ Form::label('email', 'Email', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Last Follow Up', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('last_follow_up', date('Y-m-d H:i:s'), array('class'=>'form-control form_datetime')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Email Sent', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('email_sent', Input::old('email_sent'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Active', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('active', $active, null, array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('isAutomaticFollowUp', 'Follow Up Automatically', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('isAutomaticFollowUp', $automaticFollowUp, null, array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Address', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('address', Input::old('address'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'State', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('state', Input::old('state'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'City', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('city', Input::old('city'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Phone Number (Home)', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('phone_home', Input::old('phone_home'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Phone Number (Mobile)', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('phone_mobile', Input::old('phone_mobile'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Province', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('province', Input::old('province'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Gender', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('gender', $gender, null, array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Description', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('description', Input::old('description'), array('class'=>'form-control')) }}
        </div>
  </div>
</div>
@stop