@extends('layouts.adminform')

@section('form-title')
Tambah Data Artikel
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array('admin.postcategories.store'), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.postcategories.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('title', 'Judul Kategori:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control')) }}
        </div>
    </div>
</div>
@stop