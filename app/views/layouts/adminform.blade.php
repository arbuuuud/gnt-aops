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
@yield('form-open')
<h3 class="page-title">@yield('form-title')</h3>

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
    <div class="portlet light bordered">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-info-circle"></i> Informasi
        </div>
      </div>
      <div class="portlet-body form">
        @yield('form-left')
      </div>
    </div>
  </div>
  <div class="col-md-4">
    @yield('form-right')  
  </div>
</div>

{{ Form::close() }}

@section('additional-form')
@show

@stop