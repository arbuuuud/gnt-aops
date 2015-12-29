@extends('layouts.member')

@section('content')
<div class="row">
	<div class="col-md-4">
		<h2 class="page-header">
			Member Structure
		</h2>
		@if(isset($htmltree))
			{{$htmltree}}
		@endIf
	</div>
	<div class="col-md-8 text-center">
		<h1 class="page-header">{{Sysparam::getValue('web_title')}}</h1>
		<div class="text-center">
			<p>Ini adalah backend CMS (Content Management System) dari website.</p>
			<p>Untuk mengubah konten dari website, silahkan menggunakan salah satu menu yang ada di samping.</p>
			<p><a href="{{URL::to('/')}}" class="btn btn-primary" title="Visit Site" target="_blank">Kunjungi Website</a></p>
			<p>Untuk melakukan pengaturan pada website, silahkan menggunakan menu Tampilan Web.</p>
			<p><a href="{{URL::to('admin/sysparams')}}" class="btn btn-primary" title="Tampilan Web">Atur Tampilan Web</a></p>
		</div>
	</div>
</div>
@stop