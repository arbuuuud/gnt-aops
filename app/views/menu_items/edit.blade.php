@extends('layouts.adminform')

@section('form-title')
Edit Menu Item
@stop

@section('form-open')
{{ Form::model($menuitem, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array('admin.menu_items.update', $menuitem->id))) }}
@stop

@section('form-actions')
{{ link_to_route('admin.menus.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/menu_items/'.$menuitem->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
	<div class="form-group">
		{{ Form::label('name', 'Name:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', $menuitem->name, array('class'=>'form-control')) }}
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('link', 'Link:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('link', $menuitem->link, array('class'=>'form-control')) }}
          <p class="help-block">Jika ini adalah top level menu, isikan dengan "#".</p>
        </div>
    </div>
    <div class="form-group">
		{{ Form::label('parent_id', 'Parent:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('parent_id', $menuitems, $menuitem->parent_id, array('class'=>'form-control')) }}
			<p class="help-block">Jika ini adalah top level menu, pilih opsi "Top Level". Hanya "Top Level" menu yang akan ditampilkan di pilihan ini.</p>
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
        {{ Form::label('menu_id', 'Menu:', array('class'=>'control-label')) }}
        {{ Form::select('menu_id', $menus, Input::old('menu_id'), array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('visible', 'Tampilkan:', array('class'=>'control-label')) }}
        {{ Form::select('visible', array('1' => 'Ya', '0' => 'Tidak'), $menuitem->visible, array('class'=>'form-control')) }}
      </div>
      <div class="form-group">
        {{ Form::label('order', 'Urutan:', array('class'=>'control-label')) }}
        {{ Form::text('order', $menuitem->order, array('class'=>'form-control')) }}
      </div>
    </div>
  </div>
</div>
@stop