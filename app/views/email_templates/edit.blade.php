@extends('layouts.'.Auth::user()->roleString().'form')
@section('form-title')
Edit Email Template
@stop

@section('form-open')
{{ Form::model($emailtemplate, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array(Auth::user()->roleString().'.templates.update', $emailtemplate->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route(Auth::user()->roleString().'.templates.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to(Auth::user()->roleString().'/templates/'.$emailtemplate->id)}}" class="btn red" data-method="delete" data-confirm="Are you sure you want to delete this entry?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  	<div class="form-group">
		{{ Form::label('sequence', 'Urutan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('sequence', Input::old('sequence'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('subject', 'Subject:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('subject', Input::old('subject'), array('class'=>'form-control')) }}
        </div>
    </div>
  	<div class="form-group">
    {{ Form::label('content_main_title', 'Main Title', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('content_main_title', Input::old('content_main_title'), array('class'=>'form-control')) }}
        </div>
  	</div>
  	<div class="form-group">
    {{ Form::label('content_sub_title', 'Sub Title', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('content_sub_title', Input::old('content_sub_title'), array('class'=>'form-control')) }}
        </div>
  	</div>
  	<div class="form-group">
    {{ Form::label('content_desc', 'Short Description', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('content_desc', Input::old('content_desc'), array('class'=>'form-control')) }}
        </div>
  	</div>
  	<div class="form-group">
    {{ Form::label('content_body', 'Content Body', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content_body" id="summernote_1">{{ $emailtemplate->content_body }}</textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
        </div>
  	</div>
@stop