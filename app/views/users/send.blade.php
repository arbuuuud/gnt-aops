@extends('layouts.'.Auth::user()->roleString())

@section('customcss')
{{ HTML::style('assets/global/plugins/clockface/css/clockface.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}
{{ HTML::style('assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
{{ HTML::style('assets/global/plugins/dropzone/css/dropzone.css') }}
@stop

@section('pagelevel-js')
{{ HTML::script('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}
{{ HTML::script('assets/global/plugins/clockface/js/clockface.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/moment.min.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
{{ HTML::script('assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
{{ HTML::script('assets/admin/pages/scripts/components-pickers.js') }}
{{ HTML::script('assets/global/plugins/dropzone/dropzone.js') }}
{{ HTML::script('assets/admin/pages/scripts/form-dropzone.js') }}
@stop

@section('customjs')
ComponentsPickers.init();
FormDropzone.init();
@stop

@section('content')
{{ Form::open(array('class' => 'form form-bordered', 'route' => array(Auth::user()->roleString().'.sendemailmanual'), 'files' => true)) }}
<h3 class="page-title">Kirim Email</h3>

<div class="row">
  <div class="col-md-12">
    <div class="note note-success">
      <h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
      <p>Sistem akan mengirimkan setiap email secara otomatis ke daftar kontak secara berkala, namun jika diperlukan disini Anda dapat mengirim email kepada prospek kontak yang sudah terdaftar.</p>
      <p>Pengiriman email melalui menu ini tidak akan mempengaruhi jadwal pengiriman email secara otomatis.</p>
    </div>
  </div>
</div>

<div class="page-bar">
  <div class="page-toolbar">
    <div class="btn-group pull-right">
      @yield('form-actions')
    </div>
  </div>
</div>

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

<div class="row">
  <div class="col-md-8">
    <div class="portlet box blue">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-pencil"></i> @yield('portlet-title', 'Pengisian Data')
        </div>
      </div>
      <div class="portlet-body form">
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
            {{ Form::label('contact_id', 'Penerima:', array('class'=>'col-md-4 control-label')) }}
                <div class="col-sm-8">
                  {{ Form::select('contact_id', $contacts, null, array('class'=>'form-control')) }}
                </div>
            </div>
          <div class="form-group">
            {{ Form::label('template_id', 'Template Email:', array('class'=>'col-md-4 control-label')) }}
                <div class="col-sm-8">
                  {{ Form::select('template_id', $templates, null, array('class'=>'form-control')) }}
                </div>
            </div>
          <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8">
                <button type="submit" class="btn green"><i class="fa fa-check"></i> Kirim</button>
                </div>
            </div>
        </div>
        @endIf
      </div>
    </div>
  </div>
  <div class="col-md-4">
     <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-search"></i> Daftar Template Email
        </div>
      </div>
      <div class="portlet-body form">
        <ul class="list-group">
          @foreach($list_templates as $template)
          <li class="list-group-item">
            <a href="{{url('showemail/'.$template->id)}}" target="_blank">{{$template->subject}}</a>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>
</div>

{{ Form::close() }}

@stop