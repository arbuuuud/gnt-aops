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
<a href="{{URL::to('admin/users/'.$user->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('role', 'Role:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      {{ Form::select('role', $roles, Input::old('role'), array('class'=>'form-control')) }}
    </div>
  </div>
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
    {{ Form::label('active', 'Status:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('active', $status, null, array('class'=>'form-control')) }}
        </div>
    </div>
@stop