@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar User
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif

		<div class="note note-success">
			<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
			<p>Disini Anda dapat melihat seluruh data user yang terdaftar di sistem, termasuk admin dan member. Untuk merubah data member harap melakukannya melalui sistem utama.</p>
		</div>

		<div class="table-responsive">
			<table class="table mpr_datatable">
				<thead>
					<tr>
						<th>ID</th>
						<th>Username</th>
						<th>Name</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->username }}</a></td>
						<td>{{$user->name}}</td>
						<td>{{ $user->active == '1' ? '<span class="label label-success">Aktif</span>' : '<span class="label label-default">Non-aktif</span>' }}</td>
						<td>
							@if($user->id == 1)
							<div class="btn-group">
								<a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn yellow">Edit</button></a>
							</div>
							@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop