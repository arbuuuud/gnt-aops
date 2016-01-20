@extends('layouts.'.Auth::user()->roleString())

@section('content')
<?php $currentmenu = Request::segment(3) ? Request::segment(3) : '1'; ?>
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Menu Web
			<a href="{{route('admin.menu_items.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Menu Item</a>
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="row">
			<div class="col-md-4">
				<div class="portlet light bordered">
					<div class="portlet-title">
				        <div class="caption">
				            <i class="fa fa-cogs"></i> Tambah Menu
				        </div>
				    </div>
				    <div class="portlet-body">
				    	{{Form::open(array('class' => 'form-bordered', 'route' => array('admin.menu_items.store')))}}
				    	{{Form::hidden('menu_id', $currentmenu)}}
				    	<div class="panel-group accordion" id="accordion1">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_1">
									Halaman </a>
									</h4>
								</div>
								<div id="collapse_1" class="panel-collapse collapse">
									<div class="panel-body">
										<ul class="list-group">
											{{--*/ $i=0 /*--}}
											@foreach(Page::orderBy('title')->get() as $page)
											<li class="list-group-item">
												{{Form::hidden("menuitems[$i][type]", 'page')}}
												{{Form::checkbox("menuitems[$i][id]", $page->id)}} {{$page->title}}
											</li>
											{{--*/ $i++ /*--}}
											@endforeach
										</ul>
									</div>
									<div class="panel-footer">
										<button type="submit" class="btn green"><i class="fa fa-check"></i> Tambah ke Menu</button>
									</div>
								</div>
							</div>
						</div>
						{{Form::close()}}
					</div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="portlet light bordered">
					<div class="portlet-title">
				        <div class="caption">
				            <i class="fa fa-cogs"></i> Daftar Menu
				        </div>
				    </div>
				    <div class="portlet-body form">
						<ul class="nav nav-tabs">
							{{--*/ $i=0 /*--}}
							@foreach($menus as $menuitem)
							<li role="presentation" @if ( $currentmenu == $menuitem->id ) class="active" @endif>
								<a href="{{route('admin.menus.show', $menuitem->id)}}">{{$menuitem->name}}</a>
							</li>
							{{--*/ $i++ /*--}}
							@endforeach
						</ul>
						<!-- Tab panes -->
						<div class="tab-content">
							<p>{{$menu->desc}}</p>
							{{ Form::open(array('route' => array('admin.menus.update', $menu->id), 'method' => 'put')) }}
							<button type="submit" class="pull-right btn green"><i class="fa fa-check"></i> Simpan Urutan Menu</button>
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th>Tampilkan</th>
											<th>Name</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
									@foreach($menu->items()->parent()->get() as $item)
										<tr>
											<td>{{Form::checkbox('menu[]', $item->id, $item->visible)}}</td>
											<td><strong>{{$item->name}}</strong></td>
											<td>
												<div class="btn-group">
													<a href="{{ route('admin.menu_items.edit', $item->id) }}"><button type="button" class="btn yellow">Edit</button></a>
												</div>
											</td>
										</tr>
										@if(count($item->childs))
											@foreach($item->childs as $item)
											<tr>
												<td>{{Form::checkbox('menu[]', $item->id, $item->visible)}}</td>
												<td> -- {{$item->name}}</td>
												<td>
													<div class="btn-group">
														<a href="{{ route('admin.menu_items.edit', $item->id) }}"><button type="button" class="btn yellow">Edit</button></a>
													</div>
												</td>
											</tr>
											@endforeach
										@endif
									@endforeach
									</tbody>
								</table>
							</div>
							{{Form::close()}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop