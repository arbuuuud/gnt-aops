@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2 text-center">
		<h1 class="page-header">{{Sysparam::getValue('web_title')}}</h1>
		<h2>Admin Dashboard</h2>
		<div class="text-center">
			<p>Ini adalah backend CMS (Content Management System) dari website.</p>
			<p>Untuk mengubah konten dari website, silahkan menggunakan salah satu menu yang ada di samping.</p>
			<p>Untuk melakukan pengaturan pada website, silahkan menggunakan menu Setting.</p>
			<p><a href="{{URL::to('admin/sysparams')}}" class="btn btn-primary" title="Tampilan Web">Atur Konfigurasi Sistem</a></p>
		</div>
	</div>
</div>
@stop