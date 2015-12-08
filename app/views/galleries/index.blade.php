@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Galeri Foto
			<a href="{{route('admin.galleries.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
						<th width="5%">ID</th>
						<th width="25%">Foto Utama</th>
						<th width="20%">Judul</th>
						<th width="15%">Kategori</th>
						<th>Status</th>
						<th width="15%">Terakhir Diupdate</th>
						<th width="20%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($galleries as $item)
					<tr>
						<td>{{$item->id}}</td>
						<td>
							@foreach($item->photos as $photo)
								{{ HTML::image( $photo->image, NULL, array( 'style' => 'max-width:300px;','class' => 'img-responsive img-thumbnail') ) }}
								<?php break; ?>
							@endforeach
						</td>
						<td>{{$item->title}}</td>
						<td>@if($item->category) <a href="{{ route('admin.gallerycategories.show', $item->category->slug) }}">{{$item->category->title}}</a> @endif</td>
						<td>{{ $item->status == '1' ? '<span class="label label-success">Tampilkan</span>' : '<span class="label label-default">Tidak Ditampilkan</span>' }}</td>
						<td>{{$item->translateDate($item->updated_at)}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.galleries.edit', $item->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('galeri/'.$item->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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