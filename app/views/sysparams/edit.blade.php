@extends('layouts.'.Auth::user()->roleString())

@section('content')
<h3 class="page-title">Edit Pengaturan Web</h3>

@if ($errors->any())
	<div class="alert alert-danger">
	    <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
	</div>
@endif

{{ Form::model($sysparam, array('class' => 'form-horizontal form-bordered', 'method' => 'PATCH', 'route' => array('admin.sysparams.update', $sysparam->id), 'files' => true)) }}
<div class="form-body">
	<div class="form-group">
		{{ Form::label('key', 'Key:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          <p class="form-control-static">{{$sysparam->key}}</p>
        </div>
    </div>
	<div class="form-group">
		{{ Form::label('desc', 'Keterangan:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          <p class="form-control-static">{{$sysparam->desc}}</p>
        </div>
    </div>
	@if($sysparam->type == 'text')
	<div class="form-group">
		{{ Form::label('content', 'Value:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
          <textarea name="content" class="summernote">{{ $sysparam->value->content }}</textarea>
        </div>
    </div>
	@elseif($sysparam->type == 'file')
	<div class="form-group">
		{{ Form::label('content', 'Value:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	@if($sysparam->value->content)
        	{{ HTML::image( $sysparam->value->content, NULL, array( 'class' => 'img-responsive img-thumbnail') ) }}</p>
        	@endif
        	{{ Form::file('content') }}
		</div>
	</div>
	@elseif($sysparam->type == 'string')
	<div class="form-group">
		{{ Form::label('content', 'Value:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::text('content', $sysparam->value->content, array('class'=>'form-control', 'placeholder'=> $sysparam->value->content)) }}
		</div>
	</div>
	@elseif($sysparam->type == 'integer')
	<div class="form-group">
		{{ Form::label('content', 'Value:', array('class'=>'col-md-2 control-label')) }}
        <div class="col-sm-10">
        	{{ Form::select('content', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), $sysparam->value->content, array('class'=>'form-control')) }}
		</div>
	</div>
	@endif
</div>
<div class="form-actions">
	<div class="row">
		<div class="col-md-offset-2 col-md-10">
			{{ link_to_route('admin.sysparams.index', 'Cancel', null,array('class' => 'btn btn-default')) }}
			<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop