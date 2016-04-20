@extends('layouts.adminform')

@section('form-title')
Edit Data Artikel
@stop

@section('form-open')
{{ Form::model($Postcategory, array('class' => 'form-bordered', 'method' => 'PATCH', 'route' => array('admin.postcategories.update', $Postcategory->id), 'files' => true)) }}
@stop

@section('form-actions')
{{ link_to_route('admin.postcategories.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
<a href="{{URL::to('admin/posts/'.$Postcategory->id)}}" class="btn red" data-method="delete" data-confirm="Apakah Anda yakin ingin menghapus data ini?">Delete</a>
@stop

@section('form-left')
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('title', 'Judul Kategori:', array('class'=>'col-md-2 control-label')) }}
      <div class="col-sm-10">
        {{ Form::text('title', Input::old('title'), array('class'=>'form-control', 'placeholder'=> $Postcategory->title)) }}
      </div>
  </div>
</div>
@stop
