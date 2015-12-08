@extends('layouts.adminform')

@section('form-title')
Edit Galeri Foto
	<a href="{{route('admin.photos.create', array('id' => $gallery->id))}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Upload Foto</a>
@stop

@section('form-open')
{{ Form::model($gallery, array('class' => 'form form-bordered', 'method' => 'PATCH', 'route' => array('admin.galleries.update', $gallery->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.galleries.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/galleries/'.$gallery->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('category', 'Kategori:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('gallery_category_id', $gallerycategories, Input::old('gallery_category_id'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $gallery->title)) }}
          <span class="help-block">
          	Link ke halaman ini: {{ url('galeri') }}/{{ Form::text('slug', Input::old('slug')) }}
          	<a href="{{ url('galeri/'.$gallery->slug) }}" target="_blank">Lihat <i class="fa fa-chevron-circle-right"></i></a>
          </span>
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Konten:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" id="summernote_1">{{ $gallery->content }}</textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('excerpt', 'Ringkasan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('excerpt', Input::old('excerpt'), array('class'=>'form-control', 'placeholder'=> $gallery->excerpt)) }}
          <span class="help-block">
          	Ringkasan dari berita akan ditampilkan di halaman depan untuk memudahkan pembaca
          </span>
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
				@if (isset($gallery))
				{{ Form::text('created_at', null, array('class'=>'form-control form_datetime' )) }}
				@else
				{{ Form::text('created_at', date('Y-m-d H:i:s'), array('class'=>'form-control form_datetime' )) }}
				@endif
			</div>
			<div class="form-group">
				{{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
				{{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('status'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('comment_status', 'Status Komentar:', array('class'=>'control-label')) }}
				{{ Form::select('comment_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('comment_status'), array('class'=>'form-control')) }}
			</div>
			<div class="form-group">
				{{ Form::label('social_status', 'Social Media Sharing:', array('class'=>'control-label')) }}
				{{ Form::select('social_status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('social_status'), array('class'=>'form-control')) }}
			</div>
		</div>
  	</div>
</div>
@stop

@section('additional-form')
    <h3>Daftar Foto</h3>
    @if (Session::get('fotoerrors'))
    <div class="alert alert-danger">
	    <strong>{{Session::get('fotoerrors')}}</strong>
	</div>
	@endif
	@if (Session::get('fotomessage'))
	<div class="alert alert-success">
	    <strong><i class="fa fa-check"></i> {{Session::get('fotomessage')}}</strong>
	</div>
	@endif
	@if(count($gallery->photos))
    <div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th width="5%">ID</th>
					<th width="30%">Foto</th>
					<th width="20%">Judul</th>
					<th width="20%">Terakhir Diupdate</th>
					<th width="25%"></th>
				</tr>
			</thead>
			<tbody>
			@foreach($gallery->photos as $item)
			{{ Form::model($item, array('class' => 'form form-horizontal form-bordered', 'method' => 'PATCH', 'route' => array('admin.photos.update', $item->id))) }}
				<tr>
					<td>{{$item->id}}</td>
					<td>{{ HTML::image( $item->image, NULL, array( 'style' => 'max-width:300px;','class' => 'img-responsive img-thumbnail') ) }}</td>
					<td>{{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $item->title)) }}</td>
					<td>{{$item->translateDate($item->updated_at)}}</td>
					<td>
						<button type="submit" class="btn green"><i class="fa fa-check"></i> Update</button>
						{{ Form::close() }}
						<a href="{{URL::to('admin/photos/'.$item->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
			       	</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	@else
		<p class="text-danger">Galeri ini belum memiliki foto. Silahkan mengupload foto terlebih dahulu.</p>
		<a href="{{route('admin.photos.create', array('id' => $gallery->id))}}" class="text-center btn btn-primary"><i class="fa fa-plus"></i> Upload Foto</a>
	@endif
@stop