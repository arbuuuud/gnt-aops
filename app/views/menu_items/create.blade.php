@extends('layouts.adminform')

@section('form-title')
Tambah Menu Item
@stop

@section('form-open')
{{ Form::open(array('class' => 'form-bordered', 'route' => array('admin.menu_items.store'))) }}
@stop

@section('form-actions')
{{ link_to_route('admin.menus.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', Input::old('name'), array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('link', 'Link:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('link', Input::old('link'), array('class'=>'form-control')) }}
          <p class="help-block">Jika ini adalah top level menu, isikan dengan "#".</p>
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('parent_id', 'Parent:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('parent_id', $menuitems, Input::old('parent_id'), array('class'=>'form-control')) }}
			<p class="help-block">Jika ini adalah top level menu, pilih opsi "Top Level". Hanya "Top Level" menu yang akan ditampilkan di pilihan ini.</p>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('menu_id', 'Menu:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('menu_id', $menus, Input::old('menu_id'), array('class'=>'form-control')) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('visible', 'Tampilkan:', array('class'=>'col-md-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::select('visible', array('1' => 'Ya', '0' => 'Tidak'), Input::old('visible'), array('class'=>'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('order', 'Urutan:', array('class'=>'col-md-2 control-label')) }}
		<div class="col-sm-10">
			{{ Form::text('order', Input::old('order'), array('class'=>'form-control')) }}
		</div>
	</div>
</div>
@stop