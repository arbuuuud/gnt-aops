@extends('layouts.public')

@section('head-title')
Hubungi Kami
@stop

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-10 col-md-offset-1">
    		<div class="page-header">
    			<h3 class="page-title text-center text-uppercase text-brown"> <strong>Hubungi Kami</strong></h3>
    		</div>
    		@if (Session::get('message'))
				<div class="alert alert-success">
				    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
				</div>
			@else
	    		@if ($errors->any())
					<div class="alert alert-danger">
					    <ul>
				            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
				        </ul>
					</div>
				@endif
				{{ Form::open(array('class' => 'form form-horizontal form-bordered', 'route' => array('kontak.store'))) }}
				<div class="form-body">
					<div class="form-group">
						{{ Form::label('name', 'Nama:', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				          {{ Form::text('name', Input::old('name'), array('class'=>'form-control')) }}
				    	</div>
				    </div>
				    <div class="form-group">
						{{ Form::label('phone', 'No. Tlp:', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				          {{ Form::text('phone', Input::old('phone'), array('class'=>'form-control')) }}
				    	</div>
				    </div>
				    <div class="form-group">
						{{ Form::label('email', 'Email:', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				          {{ Form::text('email', Input::old('email'), array('class'=>'form-control')) }}
				      	</div>
				    </div>
					<div class="form-group">
						{{ Form::label('content', 'Isi Pesan:', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				        	<textarea name="content" class="summernote"></textarea>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('captcha', 'Captcha', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				        	{{HTML::image(Captcha::img(), 'Captcha image')}}
				        	{{Form::text('captcha')}}
						</div>
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-primary pull-right"><i class="fa fa-check"></i> Kirim Pesan</button>
						{{Form::close()}}
					</div>
				  </div>
			  @endif
			</div>
		</div>
	</div>
</div>
@stop