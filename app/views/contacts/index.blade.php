@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Contact
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
			<div class="table-responsive">
				<table class="table mpr_datatable display" id="tableone">
					<thead>
						<tr>
							<th>Member</th>
							<th>Name</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Last Followed Up</th>
							<th>Active</th>
							<th>Automatically Followed Up</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@if($contacts)
					@foreach($contacts as $contact)
						<tr>
							<td>{{$contact->user->first_name}}</td>
							<td><a href="{{ route(Auth::user()->roleString().'.contacts.show', $contact->id) }}">{{ $contact->full_name }}</a></td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->phone_number}}</td>
							<td>{{ date('d M,Y (H:i)',strtotime($contact->last_follow_up))}}</td>
							<td>{{ $contact->active == '1' ? 'Yes' : 'No' }}</td>
							<td class="text-center">{{ $contact->isAutomaticFollowUp == '1' ? 'Yes' : 'No' }}</td>
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
</div>
@stop