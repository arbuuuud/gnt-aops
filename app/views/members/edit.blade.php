@extends('layouts.adminform')

@section('form-title')
Edit Member Data
<div class="pull-right">
    <a href="{{ url('/admin/members/'.$member->slug) }}" target="_blank">Lihat Profil <i class="fa fa-chevron-circle-right fa-lg"></i></a>
</div>
@stop

@section('form-open')
{{ Form::model($member, array('class' => 'form form-bordered', 'method' => 'PATCH', 'route' => array('admin.members.update', $member->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.members.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/members/'.$member->id)}}" class="btn red" data-method="delete" data-confirm="Are you sure you want to delete this entry?">Delete</a>
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
		{{ Form::label('last_name', 'Last Name', array('class'=>'col-md-2 control-label')) }}
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
		{{ Form::label('address', 'Address:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('address', Input::old('address'), array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('city', 'City:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('city', Input::old('city'), array('class'=>'form-control')) }}
		</div>
	</div>
    <div class="form-group">
        {{ Form::label('phone_home', 'Phone (Home):', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('phone_home', Input::old('phone_home'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('phone_mobile', 'Phone (Mobile):', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('phone_mobile', Input::old('phone_mobile'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('province', 'Province:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            {{ Form::text('province', Input::old('province'), array('class'=>'form-control')) }}
        </div>
    </div>
  <div class="form-group">
    {{ Form::label('gender', 'Gender:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('gender', $gender, null, array('class'=>'form-control')) }}
        </div>
  </div>
    <div class="form-group">
        {{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
            @if($member->image)
                <p>{{ HTML::image( $member->image, NULL, array( 'style' => 'max-width:300px;','class' => 'img-responsive img-thumbnail') ) }}</p>
            @endif
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
