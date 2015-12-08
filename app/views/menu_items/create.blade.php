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
<div class="panel-group accordion" id="accordion1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
			Halaman </a>
			</h4>
		</div>
		<div id="collapse_1" class="panel-collapse in">
			<div class="panel-body">
				{{ Form::open(array('route' => array('admin.menu_items.store'))) }}
				<div class="form-body">
					<ul class="list-group">
						@foreach(Page::orderBy('title')->get() as $page)
							<li class="list-group-item">{{Form::checkbox('page[]', $page->id)}}  {{$page->title}}</li>
						@endforeach
					</ul>
				</div>
				<div class="form-actions">
					<button type="submit" class="btn green"><i class="fa fa-check"></i> Tambah ke Menu</button>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_2">
			Collapsible Group Item #2 </a>
			</h4>
		</div>
		<div id="collapse_2" class="panel-collapse collapse">
			<div class="panel-body" style="height:200px; overflow-y:auto;">
				
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_3">
			Collapsible Group Item #3 </a>
			</h4>
		</div>
		<div id="collapse_3" class="panel-collapse collapse">
			<div class="panel-body">
				
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_4">
			Collapsible Group Item #4 </a>
			</h4>
		</div>
		<div id="collapse_4" class="panel-collapse collapse">
			<div class="panel-body">
				
			</div>
		</div>
	</div>
</div>

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