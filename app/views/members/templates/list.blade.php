@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="text-center" style="margin-bottom:20px;">
	    		<div class="page-header">
	    			<h3 class="page-title text-uppercase text-brown"><strong>{{$organization}}</strong></h3>
	    		</div>
	    	</div>

	    	<h2 class="text-center">Pimpinan Partai</h2>

    		<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>#Anggota</th>
							<th></th>
							<th>Nama</th>
							<th>Fraksi</th>
							<th>Jabatan Fraksi</th>
							<th>Organisasi</th>
							<th>Jabatan Organisasi</th>
							<th>Daerah Pemilihan</th>
							<th>Periode</th>
						</tr>
					</thead>
					<tbody>
					@foreach($members as $item)
						<tr>
							<td>{{ $item->number }}</td>
							<td>
							@if($item->image)
			               		{{ HTML::image( $item->image, $item->name, array( 'width' => '125', 'class' => 'media-object' ) ) }}
				            @else
				            	<img src="http://placehold.it/125x150">
				            @endif
							</td>
							<td><strong>{{ $item->name }}</strong><br/>{{ $item->pob.", ".$item->dob }}</td>
							<td>{{$item->fraction->name}}</td>
							<td>{{($item->fraction_position == '1') ? 'Pimpinan' : 'Anggota'}}</td>
							<td>{{$item->organization->name}}</td>
							<td>{{($item->organization_position == '1') ? 'Pimpinan' : 'Anggota'}}</td>
							<td>{{$item->area->name}}</td>
							<td>{{$item->period->name}}</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>

		</div>
	</div>
</div>
@stop