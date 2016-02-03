@extends('layouts.adminform')

@section('form-title')
Send Mail
@stop

@section('form-open')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array(Auth::user()->roleString().'.sendemailmanual'), 'files' => true)) }}
@stop

@section('form-actions')
@stop

@section('form-left')
@if(isset($message))
<div class="form-body form-horizontal">
  <div class="form-group">{{$message}}</div>
  <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn green"><i class="fa fa-check"></i> Back</button>
        </div>
    </div>
</div>
@else
<div class="form-body form-horizontal">
  <div class="form-group">
    {{ Form::label('contact_id', 'To:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::select('contact_id', $contacts, null, array('class'=>'form-control')) }}
        </div>
    </div>
  <div class="form-group">
    {{ Form::label('template_id', 'subjects:', array('class'=>'col-md-4 control-label')) }}
        <div class="col-sm-8">
          {{ Form::select('template_id', $subjects, null, array('class'=>'form-control')) }}
        </div>
    </div>
  <div class="form-group">
        <div class="col-sm-offset-4 col-sm-8">
        <button type="submit" class="btn green"><i class="fa fa-check"></i> SEND</button>
        </div>
    </div>
</div>
@endIf
@stop