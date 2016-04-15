@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Email Template
			<a href="{{route(Auth::user()->roleString().'.templates.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Template</a>
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="note note-success">
			<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
			<p>Disini Anda dapat melihat seluruh email template yang akan dikirim ke kontak yang terdatar di sistem. Setiap email akan dikirimkan berdasarkan urutan dengan selang durasi hari sesuai dengan konfigurasi sistem.</p>
			<p>Durasi saat ini: <strong>{{Sysparam::getValue('conf_follow_up_date')}} hari.</strong></p>
			<p><a href="{{ route('admin.sysparams.edit', 9)}}">Klik disini untuk merubah durasi.</a></p>
		</div>
		<div class="table-responsive">
			<table class="table mpr_datatable display" id="tableone">
				<thead>
					<tr>
						<th>Urutan</th>
						<th>Nama Template</th>
					</tr>
				</thead>
				<tbody>
				@if($emailtemplates)
					@foreach($emailtemplates as $template)
					<tr>
						<td>{{$template->sequence}}</td>
						<td>{{$template->subject}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route(Auth::user()->roleString().'.templates.edit', $template->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ route(Auth::user()->roleString().'.templates.show', $template->id) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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