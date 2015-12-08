<div class="form-group">
	{{ Form::label('created_at', 'Tanggal Pembuatan:', array('class'=>'control-label')) }}
	@if (isset($post))
	{{ Form::text('created_at', null, array('class'=>'form-control form_datetime' )) }}
	@else
	{{ Form::text('created_at', date('Y-m-d H:i:s'), array('class'=>'form-control form_datetime' )) }}
	@endif
</div>
<div class="form-group">
  {{ Form::label('status', 'Status Data:', array('class'=>'control-label')) }}
  {{ Form::select('status', array('0' => 'Tidak Ditampilkan', '1' => 'Tampilkan'), Input::old('status'), array('class'=>'form-control')) }}
</div>
<div class="form-group">
  {{ Form::label('comment_status', 'Status Komentar:', array('class'=>'control-label')) }}
  {{ Form::select('comment_status', array('1' => 'Tampilkan', '0' => 'Tidak Ditampilkan'), Input::old('comment_status'), array('class'=>'form-control')) }}
</div>
<div class="form-group">
  {{ Form::label('social_status', 'Social Media Sharing:', array('class'=>'control-label')) }}
  {{ Form::select('social_status', array('1' => 'Tampilkan', '0' => 'Tidak Ditampilkan'), Input::old('social_status'), array('class'=>'form-control')) }}
</div>