@extends('layouts.adminform')

@section('form-title')
Edit Profil
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'method' => 'PATCH', 'route' => array('user.updateProfile'))) }}
@stop

@section('form-actions')
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('first_name', 'First Name:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::text('first_name', $user->first_name, array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('last_name', 'Last Name:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::text('last_name', $user->last_name, array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('email', 'Email:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::text('email', $user->email, array('class'=>'form-control')) }}
    </div>
  </div>
	<div class="form-group">
		{{ Form::label('password', 'Password Baru:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::password('password', array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('password_confirmation', 'Konfirmasi Password Baru:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
    </div>
  </div>
</div>
@stop