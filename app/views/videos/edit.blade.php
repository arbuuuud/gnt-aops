@extends('layouts.admin')

@section('content')
<h3 class="page-title">Edit Galeri Video</h3>

@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
	</div>
@endif

{{ Form::model($video, array('class' => 'form form-horizontal form-bordered', 'method' => 'PUT', 'files' => true, 'route' => array('admin.videos.update', $video->id))) }}
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
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $video->title)) }}
          <span class="help-block">
          	Link ke halaman ini: {{ url('video') }}/{{ Form::text('slug', Input::old('slug')) }}
          	<a href="{{ url('video/'.$video->slug) }}" target="_blank">Lihat <i class="fa fa-chevron-circle-right"></i></a>
          </span>
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('content', 'Konten:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" id="summernote_1">{{ $video->content }}</textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('excerpt', 'Ringkasan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('excerpt', Input::old('excerpt'), array('class'=>'form-control', 'placeholder'=> $video->excerpt)) }}
          <span class="help-block">
          	Ringkasan dari berita akan ditampilkan di halaman depan untuk memudahkan pembaca
          </span>
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('image', 'Gambar:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ HTML::image( $video->image, $video->title, array( 'class' => 'img-responsive img-thumbnail') ) }}</p>
        	{{ Form::file('image') }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('file', 'Video:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<video id="MY_VIDEO_1" class="video-js vjs-default-skin vjs-big-play-centered" controls preload="auto" height="200" data-setup="{}">
              <source src="{{asset($video->file)}}" type='video/mp4'>
              <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
            </video>
        	{{ Form::file('file') }}
        	<span class="help-block">
          		Maximum file size allowed is {{Helpers::getMaxUpload()}} Mb.
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
          {{ Form::select('comment_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('comment_status'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
    {{ Form::label('social_status', 'Social Media Sharing:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::select('social_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('social_status'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-actions">
		<div class="row">
			<div class="col-md-offset-2 col-md-10">
				{{ link_to_route('admin.videos.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
				<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
				{{ Form::close() }}
        <a href="{{URL::to('admin/videos/'.$video->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
			</div>
		</div>
	</div>
</div>
@stop