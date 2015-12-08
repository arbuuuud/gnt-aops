@extends('layouts.admin')

@section('customcss')
{{ HTML::style('assets/global/plugins/dropzone/css/dropzone.css') }}
@stop

@section('pagelevel-js')
{{ HTML::script('assets/global/plugins/dropzone/dropzone.js') }}
{{ HTML::script('assets/admin/pages/scripts/form-dropzone.js') }}
@stop

@section('customjs')
FormDropzone.init();
@stop

@section('content')
<h3 class="page-title">Tambah Galeri Foto</h3>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

<div class="alert alert-success">
  <strong>Perhatian:</strong> Upload foto dapat dilakukan setelah Anda membuat Galeri Foto.
</div>

{{ Form::open(array('class' => 'form form-horizontal form-bordered', 'route' => array('admin.galleries.store'), 'files' => true)) }}
<div class="form-body">
	<div class="form-group">
		{{ Form::label('category', 'Kategori:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('gallery_category_id', $gallerycategories, Input::old('gallery_category_id'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Konten:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" id="summernote_1"></textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('excerpt', 'Ringkasan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('excerpt', Input::old('excerpt'), array('class'=>'form-control')) }}
          <span class="help-block">
          	Ringkasan dari berita akan ditampilkan di halaman depan untuk memudahkan pembaca
          </span>
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('related_members', 'Anggota Terkait:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('related_members[]', $members, NULL, array('class'=>'form-control select2-multiple', 'multiple'=>'multiple')) }}
          <span class="help-block">
            Galeri yang terkait dengan anggota tertentu akan ditampilkan di halaman profil anggota tersebut
          </span>
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('status', 'Status Data:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('status'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('comment_status', 'Status Komentar:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('comment_status', array('1' => 'Tampilkan', '0' => 'Tidak Ditampilkan'), Input::old('comment_status'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('social_status', 'Social Media Sharing:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('social_status',  array('1' => 'Tampilkan', '0' => 'Tidak Ditampilkan'), Input::old('social_status'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-actions">
		<div class="row">
			<div class="col-md-offset-2 col-md-10">
				{{ link_to_route('admin.galleries.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
				<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop