@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Kontak
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif

		<div class="note note-success">
			<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
			<p>Disini Anda dapat melihat seluruh data prospek kontak yang sudah mengisi form pada website replika Anda. Selain itu, Anda juga dapat melihat data prospek kontak yang terdaftar melalui website replika dari downline Anda.</p>
		</div>

		<div class="form-group">
			{{ Form::label('active', 'Nama Member', array('class'=>'col-md-2 control-label')) }}
		    <div class="col-sm-10">
	    	  <select id="member" class="form-control" name="membername" style="margin-bottom:30px;">
	    	  	<option value="">Show All</option>
	    	  	@foreach($memberCollection as $memberObject)
	    	  	<option value="{{$memberObject->name}}">
	    	  		{{$memberObject->name}}
	    	  	</option>
	    	  	@endforeach
	    	 </select>
			</div>

			<div class="table-responsive">
				<table class="table mpr_datatable display" id="contacts_table">
					<thead>
						<tr>
							<th>Member</th>
							<th>Nama Kontak</th>
							<th>Email</th>
							<th>No. Tlp</th>
							<th>Last Follow-up</th>
							<th>Metode Follow-up</th>
							<th>Status</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@if($contacts)
					@foreach($contacts as $contact)
						<tr>
							<td>{{$contact->user->name}}</td>
							<td><a href="{{ route(Auth::user()->roleString().'.contacts.show', $contact->id) }}">{{ $contact->full_name }}</a></td>
							<td>{{$contact->email}}</td>
							<td>{{$contact->phone_number}}</td>
							<td>{{ date('d F Y - H:i',strtotime($contact->last_follow_up))}}</td>
							<td class="text-center">{{ $contact->isAutomaticFollowUp == '1' ? 'Automatic' : 'Manual' }}</td>
							<td>{{ $contact->active == '1' ? '<span class="label label-success">Aktif</span>' : '<span class="label label-default">Tidak Aktif</span>' }}</td>
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

@section('customjs')
var contacts_table = $("#contacts_table").DataTable();
var current_member = $('select#member').val();

contacts_table.search(current_member).draw();
  
$("select#member").on('change', function() {
	contacts_table.search(this.value).draw();
}); 
@stop