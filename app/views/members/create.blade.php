@extends('layouts.adminform')

@section('form-title')
Members
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.members.store'), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.members.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
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
    {{ Form::label('password', 'Password:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      {{ Form::password('password', array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('password_confirmation', 'Password Confirmation:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Address', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('address', Input::old('address'), array('class'=>'form-control')) }}
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
        {{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::file('image') }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('pob', 'Place of Birth:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('pob', Input::old('pob'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('dob', 'Date of Birth:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('dob', Input::old('dob'), array('class'=>'form-control')) }}
        </div>
    </div>
</div>
@stop