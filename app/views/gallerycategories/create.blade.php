@extends('layouts.adminform')

@section('form-title')
Tambah Kategori Galeri
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.gallerycategories.store'))) }}
@stop

@section('form-actions')
{{ link_to_route('admin.videocategories.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
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
	             {{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
	             {{ Form::select('status', array('1' => 'Tampilkan', '0' => 'Tidak Ditampilkan'), Input::old('status'), array('class'=>'form-control')) }}
	          </div>
	        <div class="form-group">
	            {{ Form::label('menu_order', 'Urutan Menu:', array('class'=>'control-label')) }}
	            {{ Form::text('menu_order', Input::old('menu_order'), array('class'=>'form-control')) }}
	        </div>
	    </div>
	 </div>
</div>
@stop