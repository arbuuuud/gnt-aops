@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Semua Surat Pembaca
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
						<th width="25%">Judul</th>
						<th width="20%">Konten</th>
						<th width="25%">Pengirim</th>
						<th width="10%">Status</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($guestmails as $mail)
					<tr>
						<td>{{$mail->id}}</td>
						<td><a href="{{ route('admin.guestmails.edit', $mail->id) }}">{{ $mail->title }}</a></td>
						<td>{{ str_limit(strip_tags($mail->content), 50) }}</td>
						<td>
							{{$mail->name}}<br/>
							{{$mail->address}}<br/>
							{{$mail->city}}<br/>
							{{$mail->phone}}<br/>
							<a href="mailto:{{$mail->email}}">{{$mail->email}}</a>
						</td>
						<td>{{ $mail->status == '1' ? '<span class="label label-success">Diterima</span>' : '<span class="label label-default">Pending</span>' }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.guestmails.edit', $mail->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('surat/'.$mail->id) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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