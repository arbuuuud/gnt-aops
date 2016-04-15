@extends('layouts.adminform')

@section('form-title')
Edit Data User
@stop

@section('form-open')
{{ Form::model($user, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array('admin.users.update', $user->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.users.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('role_id', 'Role:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::select('role_id', $roles, Input::old('role_id'), array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('username', 'Username:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('username', Input::old('username'), array('class'=>'form-control')) }}
        </div>
  </div>
  <div class="form-group">
    {{ Form::label('name', 'Name:', array('class'=>'col-md-4 control-label')) }}
      <div class="col-sm-8">
        {{ Form::text('name', Input::old('name'), array('class'=>'form-control')) }}
      </div>
  </div>
  <div class="form-group">
    {{ Form::label('password', 'Password:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::password('password', array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('password_confirmation', 'Konfirmasi Password:', array('class'=>'col-md-4 control-label')) }}
    <div class="col-sm-8">
      {{ Form::password('password_confirmation', array('class'=>'form-control')) }}
    </div>
  </div>
  <div class="form-group">
    {{ Form::label('active', 'Status:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::select('active', $status, null, array('class'=>'form-control')) }}
        </div>
    </div>
@stop