@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Halaman
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
						<th>ID</th>
						<th>Judul</th>
						<th>Status</th>
						<th>Tanggal Dibuat</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
						<td>{{$page->id}}</td>
						<td><a href="{{ route('admin.pages.edit', $page->id) }}">{{ $page->title }}</a></td>
						<td>{{ $page->status == '1' ? '<span class="label label-success">Tampilkan</span>' : '<span class="label label-default">Tidak Ditampilkan</span>' }}</td>
						<td>{{ $page->translateDate($page->created_at) }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.pages.edit', $page->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('pages/'.$page->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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