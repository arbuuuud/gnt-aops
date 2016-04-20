@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Halaman
			<a href="{{route(Auth::user()->roleString().'.pages.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Halaman</a>
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="note note-success">
			<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
			<p>Disini Anda dapat melihat seluruh halaman yang ada di web dari GNT System. Jika diperlukan, Anda juga dapat membuat halaman baru. Halaman dapat dimasukkan ke dalam menu untuk ditampilkan di web.</p>
			<p><a href="{{ route('admin.menus.index') }}">Klik disini untuk merubah menu.</a></p>
		</div>
		<div class="table-responsive">
			<table class="table mpr_datatable">
				<thead>
					<tr>
						<th>Judul</th>
						<th>Status</th>
						<th>Tanggal Dibuat</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($pages as $page)
					<tr>
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