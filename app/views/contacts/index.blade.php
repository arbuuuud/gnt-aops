@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Contact
			<a href="{{route(Auth::user()->roleString().'.contacts.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Registrasi Contact</a>
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
						<th>Last Followed Up</th>
						<th>Email Sent</th>
						<th>Active</th>
						<th>Automatically Followed Up</th>
						<th>Address</th>
						<th>State</th>
						<th>City</th>
						<th>Phone (Home)</th>
						<th>Phone (Mobile)</th>
						<th>Province</th>
						<th>Gender</th>
						<th>Description</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@if($contacts)
				@foreach($contacts as $contact)
					<tr>
						<td>{{$contact->id}}</td>
						<td><a href="{{ route(Auth::user()->roleString().'.contacts.show', $contact->id) }}">{{ $contact->first_name }}</a></td>
						<td>{{$contact->last_name}}</td>
						<td>{{$contact->email}}</td>
						<td>{{$contact->last_follow_up}}</td>
						<td class="text-center">{{$contact->email_sent}}</td>
						<td>{{ $contact->active == '1' ? 'Yes' : 'No' }}</td>
						<td class="text-center">{{ $contact->isAutomaticFollowUp == '1' ? 'Yes' : 'No' }}</td>
						<td>{{$contact->address}}</td>
						<td>{{$contact->state}}</td>
						<td>{{$contact->city}}</td>
						<td>{{$contact->phone_home}}</td>
						<td>{{$contact->phone_mobile}}</td>
						<td>{{$contact->province}}</td>
						<td class="text-center">{{ $contact->gender == '1' ? 'Male' : 'Female' }}</td>
						<td>{{$contact->description}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route(Auth::user()->roleString().'.contacts.edit', $contact->id) }}"><button type="button" class="btn yellow">Edit</button></a>
							</div>
						</td>
					</tr>
				@endforeach
				@endIf
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop