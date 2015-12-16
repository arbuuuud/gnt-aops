@extends('layouts.adminform')

@section('form-title')
Tambah Data User
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.users.store'), 'files' => true)) }}
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
        	{{ Form::select('role_id', $roles, null, array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('first_name', 'First Name:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('first_name', Input::old('first_name'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('last_name', 'Last Name:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('last_name', Input::old('last_name'), array('class'=>'form-control')) }}
		    </div>
	</div>
  <div class="form-group">
    {{ Form::label('email', 'Email:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
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
</div>
@stop