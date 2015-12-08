@extends('layouts.admin')

@section('customcss')
{{ HTML::style('assets/global/plugins/dropzone/css/dropzone.css') }}
@stop

@section('pagelevel-js')
{{ HTML::script('assets/global/plugins/dropzone/dropzone.js') }}
{{ HTML::script('assets/admin/pages/scripts/form-dropzone.js') }}
@stop

@section('customjs')
FormDropzone.init();
@stop

@section('content')
<h3 class="page-title">
	Upload Foto
	<a href="{{ route('admin.galleries.edit', $gallery->id) }}"><button type="button" class="pull-right btn btn-primary">&laquo; Kembali ke Galeri</button></a>
</h3>
<p>Foto akan diupload ke Galeri dengan judul:<br/><strong>{{$gallery->title}}</strong></p>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif

{{ Form::open(array('class' => 'form form-horizontal form-bordered dropzone', 'id' => 'mpr-dropzone', 'route' => array('admin.photos.upload', $gallery->id), 'files' => true)) }}
{{ Form::close() }}

<br/>
<div class="alert alert-info">
<p>Tipe file yang diperbolehkan adalah .jpeg, .png, .bmp & .gif dengan resolusi minimal {{Sysparam::getValue('gallery_min_width')}} x {{Sysparam::getValue('gallery_min_height')}}.</p>
</div>
@stop