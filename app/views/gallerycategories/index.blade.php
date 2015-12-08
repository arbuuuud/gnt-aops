@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Kategori Galeri Foto
			<a href="{{route('admin.gallerycategories.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
						<th>Jumlah Galeri</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($gallerycategories as $category)
					<tr>
						<td><a href="{{ route('admin.gallerycategories.show', $category->slug) }}">{{ $category->title }}</a></td>
						<td>{{$category->galleries->count()}}</td>
						<td>{{ $category->status == '1' ? '<span class="label label-success">Tampilkan</span>' : '<span class="label label-default">Tidak Ditampilkan</span>' }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.gallerycategories.edit', $category->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('kategori-galeri/'.$category->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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