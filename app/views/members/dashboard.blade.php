@extends('layouts.member')

@section('content')
<div class="row">
	<div class="col-md-4">
		<h2 class="page-header text-center">
			Member Structure
		</h2>
		@if(isset($htmltree))
			{{$htmltree}}
		@endIf
	</div>
	<div class="col-md-8 text-center">
		<h2 class="page-header">
			Recent Subscriber
		</h2>
		<table class="table display" id="tableone">
				<thead>
					<tr>
						<th class="text-center">Member Name</th>
						<th class="text-center">First Name</th>
						<th class="text-center">Last Name</th>
						<th class="text-center">Last Followed Up</th>
					</tr>
				</thead>
				<tbody>
				@if($contacts)
				@foreach($contacts as $contact)
					<tr>
						<td>{{$contact->user->first_name}}</td>
						<td>{{$contact->first_name }}</td>
						<td>{{$contact->last_name}}</td>
						<td>{{$contact->last_follow_up}}</td>
					</tr>
				@endforeach
				@endIf
				</tbody>
			</table>
	</div>
</div>
@stop