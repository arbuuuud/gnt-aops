@extends('layouts.adminform')

@section('form-title')
Tambah Email Template
@stop

@section('form-open')
{{ Form::open(array('class' => 'form-bordered', 'files' => true, 'route' => array('admin.templates.store'))) }}
@stop

@section('form-actions')
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
{{ link_to_route('admin.templates.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
@stop

@section('form-left')
<div class="form-body form-horizontal ">
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
        	<textarea name="content_body" id="summernote_1"></textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
        </div>
  	</div>
</div>
@stop