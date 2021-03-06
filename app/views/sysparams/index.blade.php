@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Konfigurasi Sistem
		</h3>
		 <div class="note note-success">
            <h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
            <p>Harap berhati-hati dalam merubah konfigurasi pada sistem. Jika Anda kurang yakin harap menghubungi admin dari sistem.</p>
        </div>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="table-responsive">
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>Key</th>
						<th>Keterangan</th>
						<th>Konten</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($sysparams as $sysparam)
					<tr>
						<td>{{$sysparam->id}}</td>
						<td>{{$sysparam->key}}</td>
						<td>{{$sysparam->desc}}</td>
						<td>
							@if($sysparam->type == 'integer')
								@if($sysparam->value->content == '1')
									Tampilkan
								@else
									Tidak Ditampilkan
								@endif
							@else
								{{$sysparam->value->content}}
							@endif
						</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.sysparams.edit', $sysparam->id) }}"><button type="button" class="btn yellow">Edit</button></a>
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