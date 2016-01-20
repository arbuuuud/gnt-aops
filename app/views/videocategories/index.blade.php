@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Kategori Video
			<a href="{{route('admin.videocategories.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
						<th>Jumlah Video</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($videocategories as $category)
					<tr>
						<td><a href="{{ route('admin.videocategories.show', $category->slug) }}">{{ $category->title }}</a></td>
						<td>{{$category->videos->count()}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.videocategories.edit', $category->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('kategori-video/'.$category->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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