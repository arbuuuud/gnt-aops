@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Daftar Artikel <strong>{{ $category->title }}</strong>
			<a href="{{route('admin.posts.create', array('cat' => $category->id))}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Tambah Baru</a>
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
						<th width="10%">Foto Utama</th>
						<th width="25%">Judul</th>
						<th width="10%">Kategori</th>
						<th width="10%">Views</th>
						<th width="10%">Status</th>
						<th width="10%">Tanggal Pembuatan</th>
						<th width="25%"></th>
					</tr>
				</thead>
				<tbody>
				@foreach($posts as $post)
					<tr>
						<td>{{$post->id}}</td>
						<td>
						@if($post->image)
		               		{{ HTML::image( $post->image, $post->title, array( 'width' => '100', 'class' => 'media-object' ) ) }}
			            @else
			            	{{ HTML::image( 'img/default-pic.jpg', $post->title, array( 'width' => '100', 'class' => 'media-object' ) ) }}
			            @endif
						</td>
						<td><a href="{{ route('admin.posts.edit', $post->id) }}">{{ $post->title }}</a></td>
						<td>{{$post->category->title}}</td>
						<td>{{$post->view_count}}</td>
						<td>{{ $post->status == '1' ? '<span class="label label-success">Tampilkan</span>' : '<span class="label label-default">Tidak Ditampilkan</span>' }}</td>
						<td>{{ $post->translateDate($post->created_at) }}</td>
						<td>
							<div class="btn-group">
								<a href="{{ route('admin.posts.edit', $post->id) }}"><button type="button" class="btn yellow">Edit</button></a>
								<a href="{{ URL::to('posts/'.$post->slug) }}" target="_blank"><button type="button" class="btn green">View</button></a>
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