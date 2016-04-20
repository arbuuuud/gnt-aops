@extends('layouts.adminform')

@section('form-title')
Tambah Halaman
@stop

@section('form-open')
{{ Form::open(array('class' => 'form-bordered', 'files' => true, 'route' => array('admin.pages.store'))) }}
@stop

@section('form-actions')
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
{{ link_to_route('admin.pages.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
@stop

@section('form-left')
<div class="form-body form-horizontal ">
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
      </div>
    </div>
	<div class="form-group">
	  {{ Form::label('content', 'Konten:', array('class'=>'col-md-2 control-label')) }}
    <div class="col-sm-10">
      <textarea name="content" id="summernote_1"></textarea>
      <span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
	  </div>
	</div>
</div>
@stop

@section('form-right')
<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-cogs"></i> Pengaturan
    </div>
  </div>
  <div class="portlet-body form">
  	<div class="form-body">
  		<div class="form-group">
      {{ Form::label('created_at', 'Tanggal Pembuatan:', array('class'=>'control-label')) }}
      {{ Form::text('created_at', date('Y-m-d H:i:s'), array('class'=>'form-control form_datetime' )) }}
    </div>
    <div class="form-group">
      {{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
      {{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), null, array('class'=>'form-control')) }}
    </div>
	</div>
  </div>
</div>
@stop