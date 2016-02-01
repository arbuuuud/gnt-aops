@extends('layouts.public')

@section('head-title')
404: Halaman Tidak Ditemukan
@stop

@section('content')
<div id="main-banner" class="container-fluid">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-4 col-md-offset-4 space-buffer">
          <h1 class="registration-box">
            <strong><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> 404: Halaman Tidak Ditemukan</strong>
          </h1> 
          <p class="registration-box">Mohon maaf halaman yang Anda cari tidak dapat ditemukan.</p>
          <p class="registration-box">Kemungkinan halaman telah dihapus, atau Anda salah menuliskan URL.</p>
      </div>
    </div>
  </div>
</div>
@stop