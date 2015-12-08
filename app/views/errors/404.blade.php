@extends('layouts.public')

@section('head-title')
404: Halaman Tidak Ditemukan
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
    	<div class="panel panel-danger">
			<div class="panel-heading">
				<h3 class="page-title text-center text-uppercase">
					<strong><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> 404: Halaman Tidak Ditemukan</strong>
				</h3>
			</div>
			<div class="panel-body">
				<p class="text-center">Mohon maaf halaman yang Anda cari tidak dapat ditemukan.<br/>
					Kemungkinan halaman telah dihapus, atau Anda salah menuliskan URL.<br/>
					Silahkan kembali ke <a href="{{ URL::to('/') }}">Beranda</a></p>
			</div>
		</div>
    </div>
  </div>
</div>
@stop