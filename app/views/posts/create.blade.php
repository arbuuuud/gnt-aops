@extends('layouts.adminform')

@section('form-title')
Tambah Data Artikel <strong>{{ $selected_cat->title }}</strong>
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.posts.store'), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.posts.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('category', 'Kategori:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('post_category_id', $postcategories, $selected_cat->id, array('class'=>'form-control')) }}
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
		{{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
      	{{ Form::file('image') }}
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
      @include('includes.postmeta')
      <div class="form-group">
        {{ Form::label('related_members', 'Anggota Terkait:', array('class'=>'control-label')) }}
        {{ Form::select('related_members[]', $members, NULL, array('class'=>'form-control select2-multiple', 'multiple'=>'multiple')) }}
        <span class="help-block">
          Berita yang terkait dengan anggota tertentu akan ditampilkan di halaman profil anggota tersebut
        </span>
      </div>
    </div>
  </div>
</div>
@stop