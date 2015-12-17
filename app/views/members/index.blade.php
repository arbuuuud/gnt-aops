@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Member List
			<a href="{{route('admin.members.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Registrasi Member</a>
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
						<th>Active</th>
						<th>Address</th>
						<th>City</th>
						<th>Phone (Home)</th>
						<th>Phone (Mobile)</th>
						<th>Province</th>
						<th>Gender</th>
						<th>Photo</th>
						<th>Place Of Birth</th>
						<th>Date Of Birth</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($members as $member)
					<tr>
						<td>{{ $member->id }}</td>
						<td>{{ $member->first_name }}</td>
						<td>{{ $member->last_name}}</td>
						<td>{{ $member->email }}</td>
						<td>{{ $member->active == '1' ? 'Yes' : 'No' }}</td>
						<td>{{ $member->address }}</td>
						<td>{{ $member->city }}</td>
						<td>{{ $member->phone_home }}</td>
						<td>{{ $member->phone_mobile }}</td>
						<td>{{ $member->province }}</td>
						<td>{{ $member->gender }}</td>
						<td>
						@if($member->image)
		               		{{ HTML::image( $member->image, $member->name, array( 'width' => '125', 'class' => 'media-object' ) ) }}
			            @else
			            	{{ HTML::image( 'img/default-members.jpg', $member->name, array( 'width' => '125', 'class' => 'media-object' ) ) }}
			            @endif
						</td>
						<td>{{ $member->pob }}</td>
						<td>{{ $member->dob }}</td>
						
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.members.edit', $member->id) }}"><button type="button" class="btn yellow">Edit</button></a>
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