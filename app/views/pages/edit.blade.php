@extends('layouts.adminform')

@section('form-title')
Edit Halaman
@stop

@section('form-open')
{{ Form::model($page, array('class' => 'form-bordered', 'method' => 'PATCH', 'files' => true, 'route' => array('admin.pages.update', $page->id))) }}
@stop

@section('form-actions')
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
{{ link_to_route('admin.pages.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<a href="{{URL::to('admin/pages/'.$page->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal ">
	<div class="form-group">
		{{ Form::label('title', 'Judul:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $page->title)) }}
          <span class="help-block">
          	Link ke halaman ini: {{ url('pages') }}/{{ Form::text('slug', Input::old('slug')) }}
          	<a href="{{ url('pages/'.$page->slug) }}" target="_blank">Lihat <i class="fa fa-chevron-circle-right"></i></a>
          </span>
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Konten:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" id="summernote_1">{{ $page->content }}</textarea>
			<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
		</div>
	</div>
	@if (Session::get('documentmessage'))
	<div class="alert alert-success">
	    <strong><i class="fa fa-check"></i> {{Session::get('documentmessage')}}</strong>
	</div>
	@endif
	<div class="form-group">
		{{ Form::label('document', 'Dokumen:', array('class'=>'col-md-2 control-label')) }}
    	<div class="col-sm-10">
    		{{ Form::file('documents[]', ['multiple' => true]) }}
	    	{{ Form::file('documents[]', ['multiple' => true]) }}
	    	{{ Form::file('documents[]', ['multiple' => true]) }}
	    	{{ Form::file('documents[]', ['multiple' => true]) }}
	    	{{ Form::file('documents[]', ['multiple' => true]) }}
	    	<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Judul</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
					@foreach($page->documents as $document)
						<tr>
							<td>{{$document->id}}</td>
							<td>{{$document->name}}</td>
							<td>
								<a href="{{URL::to('admin/documents/'.$document->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
					       	</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			</div>
	    </div>
	</div>
</div>
@stop

@section('form-right')
<div class="portlet light bordered">
  <div class="portlet-title">
    <div class="caption">
      <i class="fa fa-cogs"></i> Pengaturan
    </div>
  </div>
  <div class="portlet-body form">
  	<div class="form-body">
  		@include('includes.postmeta')
	</div>
  </div>
</div>
@stop