@extends('layouts.admin')

@section('content')
<h3 class="page-title">Edit Data Surat Pembaca</h3>

@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
	</div>
@endif

@if (Session::get('message'))
<div class="alert alert-success">
    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
</div>
@endif

{{ Form::model($guestmail, array('class' => 'form-horizontal form-bordered', 'method' => 'PATCH', 'route' => array('admin.guestmails.update', $guestmail->id))) }}
<div class="form-body">
	<div class="form-group">
		{{ Form::label('name', 'Nama Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('name', Input::old('name'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('address', 'Alamat Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('address', Input::old('address'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('city', 'Kota Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('city', Input::old('city'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('phone', 'No. Tlp Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
    	</div>
    </div>
    <div class="form-group">
		{{ Form::label('email', 'Email Pengirim:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('email', Input::old('email'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
      	</div>
    </div>
	<div class="form-group">
		{{ Form::label('title', 'Judul Surat:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $guestmail->name)) }}
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('content', 'Isi Surat:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	<textarea name="content" class="summernote">{{$guestmail->content}}</textarea>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('status', 'Status', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('status', array('0' => 'Pending', '1' => 'Diterima'), Input::old('status'), array('class'=>'form-control')) }}
		</div>
	</div>
</div>
<div class="form-actions">
	<div class="row">
		<div class="col-md-offset-2 col-md-10">
			{{ link_to_route('admin.guestmails.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
			<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
			{{ Form::close() }}
      <a href="{{URL::to('admin/guestmails/'.$guestmail->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
		</div>
	</div>
</div>
@stop