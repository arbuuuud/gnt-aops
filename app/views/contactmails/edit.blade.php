@extends('layouts.admin')

@section('content')
<h3 class="page-title">Edit Data Pesan Pembaca</h3>

@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
	</div>
@endif

@if (Session::get('message'))
<div class="alert alert-success">
    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
</div>
@endif

{{ Form::model($contactmail, array('class' => 'form-horizontal form-bordered', 'method' => 'PATCH', 'route' => array('admin.contactmails.update', $contactmail->id))) }}
<div class="form-body">
	<div class="form-group">
		{{ Form::label('name', 'Nama Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=> $contactmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('phone', 'No. Tlp Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control', 'placeholder'=> $contactmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('email', 'Email Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=> $contactmail->name)) }}
      	</div>
    </div>
	<div class="form-group">
		{{ Form::label('content', 'Isi Pesan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" class="summernote">{{$contactmail->content}}</textarea>
		</div>
	</div>
</div>
<div class="form-actions">
	<div class="row">
		<div class="col-md-offset-2 col-md-10">
			{{ link_to_route('admin.contactmails.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
			<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
			{{ Form::close() }}
			{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('admin.contactmails.destroy', $contactmail->id))) }}
          {{ Form::submit('Delete', array('class' => 'btn red')) }}
      {{ Form::close() }}
		</div>
	</div>
</div>
@stop