@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua User
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
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Role</th>
						<th>Active</th>
						<th>Created At</th>
						<th>Last Update</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($users as $user)
					@if($user->id != 1)
					<tr>
						<td>{{$user->id}}</td>
						<td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->first_name }}</a></td>
						<td>{{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->role->name}}</td>
						<td>{{ $user->active == '1' ? '<span class="label label-success">Aktif</span>' : '<span class="label label-default">Non-aktif</span>' }}</td>
						<td>{{ $user->translateDate($user->created_at) }}</td>
						<td>{{ $user->translateDate($user->updated_at) }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn yellow">Edit</button></a>
							</div>
						</td>
					</tr>
					@endif
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop