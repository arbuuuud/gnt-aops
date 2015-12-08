@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Anggota
			<a href="{{route('admin.members.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
						<th>#Anggota</th>
						<th></th>
						<th>Nama</th>
						<th>Fraksi</th>
						<th>Daerah Pemilihan</th>
						<th>Badan</th>
						<th>Periode</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				@foreach($members as $item)
					<tr>
						<td>{{ $item->id }}</td>
						<td>{{ $item->number }}</td>
						<td>
						@if($item->image)
		               		{{ HTML::image( $item->image, $item->name, array( 'width' => '125', 'class' => 'media-object' ) ) }}
			            @else
			            	{{ HTML::image( 'img/default-members.jpg', $item->name, array( 'width' => '125', 'class' => 'media-object' ) ) }}
			            @endif
						</td>
						<td><strong>{{ $item->name }}</strong><br/>{{ $item->pob.", ".$item->dob }}</td>
						<td>
							<p><a href="{{ route('admin.fractions.show', $item->fraction->slug) }}">{{$item->fraction->name}}</a></p>
							<label class="label label-primary">{{($item->fraction_position == '1') ? 'Pimpinan' : 'Anggota'}}</label>
						</td>
						<td>{{$item->area->name}}</td>
						<td>
							<p><a href="{{ route('admin.organizations.show', $item->organization->slug) }}">{{$item->organization->name}}</a></p>
							<label class="label label-primary">{{($item->organization_position == '1') ? 'Pimpinan' : 'Anggota'}}</label>
						</td>
						<td>{{$item->period->name}}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.members.edit', $item->id) }}"><button type="button" class="btn yellow">Edit</button></a>
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