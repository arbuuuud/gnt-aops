@extends('layouts.'.Auth::user()->roleString())

@section('content')
<h3 class="page-title">Tambah Galeri Video</h3>

@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
	</div>
@endif

{{ Form::open(array('class' => 'form form-horizontal form-bordered', 'route' => array('admin.videos.store'), 'files' => true)) }}
<div class="form-body">
	<div class="form-group">
		{{ Form::label('category', 'Kategori:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('video_category_id', $videocategories, Input::old('video_category_id'), array('class'=>'form-control')) }}
        </div>
  </div>
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
     {{ Form::label('image', 'Gambar:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::file('image') }}
       </div>
  </div>
  <div class="form-group">
	   {{ Form::label('file', 'Video:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
      	{{ Form::file('file') }}
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
				{{ link_to_route('admin.videos.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
				<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
				{{ Form::close() }}
			</div>
		</div>
	</div>
</div>
@stop