@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Pesan Pembaca
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
						<th>Pengirim</th>
						<th>Pesan</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($contactmails as $mail)
					<tr>
						<td>{{$mail->id}}</td>
						<td>
							{{$mail->name}}<br/>
							{{$mail->phone}}<br/>
							<a href="mailto:{{$mail->email}}">{{$mail->email}}</a>
						</a></td>
						<td>{{ str_limit(strip_tags($mail->content), 50) }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.contactmails.edit', $mail->id) }}"><button type="button" class="btn yellow">Edit</button></a>
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