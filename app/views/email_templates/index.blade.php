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


		<div class="table-responsive">
			<table class="table mpr_datatable display" id="tableone">
				<thead>
					<tr>
						<th>sequence</th>
						<th>Subject</th>
						<th>HTML</th>
					</tr>
				</thead>
				<tbody>
				@if($emailtemplates)
				@foreach($emailtemplates as $template)
					<tr>
						<td>{{$template->sequence}}</td>
						<td>{{$template->subject}}</td>
						<td>{{ HTML::link(Auth::user()->roleString().'/showtemplate/'.$template->html_body,$template->html_body) }}</td>
						
						<td>
							<div class="btn-group">
								<a href="{{ route(Auth::user()->roleString().'.templates.edit', $template->id) }}"><button type="button" class="btn yellow">Edit</button></a>
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