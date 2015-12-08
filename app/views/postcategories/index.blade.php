@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Kategori Post
			<a href="{{route('admin.categories.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="table-responsive">
			<table class="table mpr_datatable">
				<thead>
					<tr>
						<th>Nama</th>
						<th>Jumlah Post</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($postcategories as $category)
					<tr>
						<td><a href="{{ route('admin.categories.show', $category->slug) }}">{{ $category->title }}</a></td>
						<td>{{$category->posts->count()}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.categories.edit', $category->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('kategori/'.$category->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
							</div>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop