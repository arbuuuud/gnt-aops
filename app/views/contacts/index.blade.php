@extends('layouts.'.Auth::user()->roleString())

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Contact
			<!-- <a href="{{route(Auth::user()->roleString().'.contacts.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Registrasi Contact</a> -->
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif

<div id="styled-select">
</div>

  <div class="form-group">
    {{ Form::label('active', 'Nama Member', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	  <select id="member" class="form-control" name="membername">
        	  	@foreach($memberCollection as $memberObject)
        	  	<option value="{{$memberObject->name}}">
        	  		{{$memberObject->name}}
        	  	</option>
        	  	@endforeach
        	 </select>
  </div>

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
						<td><a href="{{ route(Auth::user()->roleString().'.contacts.show', $contact->id) }}">{{ $contact->first_name }}</a></td>
						<td>{{$contact->email}}</td>
						<td>{{$contact->phone_home}}</td>
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
@stop