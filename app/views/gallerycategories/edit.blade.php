@extends('layouts.adminform')

@section('form-title')
Edit Kategori Galeri
@stop

@section('form-open')
{{ Form::model($gallerycategory, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array('admin.gallerycategories.update', $gallerycategory->id))) }}
@stop

@section('form-actions')
{{ link_to_route('admin.gallerycategories.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/gallerycategories/'.$gallerycategory->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $gallerycategory->title)) }}
          <span class="help-block">
          	Link ke halaman ini: {{ url('kategori-galeri') }}/{{ Form::text('slug', Input::old('slug')) }}
          	<a href="{{ url('kategori-galeri/'.$gallerycategory->slug) }}" target="_blank">Lihat <i class="fa fa-chevron-circle-right"></i></a>
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
        {{ Form::text('created_at', Input::old('created_at'), array('class'=>'form-control form_datetime', 'placeholder'=> $gallerycategory->created_at)) }}
      </div>
      <div class="form-group">
        {{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
        {{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('status'), array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
          {{ Form::label('menu_order', 'Urutan Menu:', array('class'=>'control-label')) }}
          {{ Form::text('menu_order', Input::old('menu_order'), array('class'=>'form-control')) }}
        </div>
    </div>
  </div>
</div>
@stop