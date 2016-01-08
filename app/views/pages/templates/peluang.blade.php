@extends('layouts.public')

@section('head-title')
Home
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
        <div id="peluang-main-banner"> 
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div id="peluang-banner-text">
                  <h2 class="peluang text-lightgreen">Perhatian : Semua Pebisnis, Karyawan & Apapun profesi Anda!</h2>
                  <h2 class="peluang text-white">"Bagaimana Jika Hari Ini, ANDA BISA Memiliki Toko Online Kelas Dunia Seperti Amazon.com?"</h2>
                  <h2 class="peluang text-green">Walaupun saat ini Anda merasa GAPTEK, Tidak punya pengalaman dan Belum pernah bisnis online sama sekali. Mulai hari ini Anda bisa mendapatkan passive income dari Toko Online. </h2>
                  <div class="subscribe-button-huge text-center">
                    Mulai Sekarang
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>
<div class="container">
    <div class="row">
      <div id="peluang-introduction" class="col-sm-12">
          <h1 class="testimonial-title text-center">MLM ONLINE BERSAMA GNT</h1>
          <p>Melalui website ini, Anda dapat berbelanja produk-produk GNT dan menjadi distributor perusahaan ini.</p>
          <p>Tidak hanya itu, setelah menjadi distributor Anda juga bisa menggunakan Gntclub.com untuk menjual produk-produk GNT dan merekrut distributor baru, keduanya secara online. Silakan mendaftar di sini jika Anda ingin menjadi distributor GNT dan memanfaatkan fasilitas-fasilitas website ini.</p>
          <p>Anda akan mendapatkan kemudahan dalam mengerjakan bisnis MLM Online bersama Gntclub.com. Kami menyediakan artikel-artikel yang bisa Anda share ke sosial media (Facebook, Twitter, Google+, LinkedIn), yang link-nya memuat kode referral Anda. Teman-teman Anda yang meng-klik link artikel, dan kemudian bergabung menjadi distributor GNT, secara otomatis akan menjadi downline Anda.</p>
          <p>Bagi Anda yang hanya ingin menjadi affiliate, kami menyediakan komisi untuk setiap distributor baru yang bergabung melalui link referral Anda. Silakan mendaftar di sini jika Anda ingin menjadi Affiliate.</p>
      </div>
    </div>
    <div class="subscribe-button-huge text-center">
      Ya saya mau bergabung dengan gnt
    </div> 
</div>

  <div class="container-fluid">
    <div class="row">
      <div id="profile-banner" class="col-sm-12">
          <h1 class="testimonial-title text-white text-center">Untuk memesan silakan klik gambar produk dibawah</h1>
      </div>
    </div>
  </div>

  <div id="product-list" class="container">
    <div class="row">
       <div class="col-sm-4 text-center">
        {{ HTML::image( 'img/product.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
        <p><strong>GNT FIBER @ 6 sachet</strong></p>
        <p>Harga: Rp. 120.000</p>
      </div>
      <div class="col-sm-4 text-center">
        {{ HTML::image( 'img/product-2.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
        <p><strong>GNT FIBER @ 15 sachet</strong></p>
        <p>Harga: Rp. 280.000</p>
      </div>
      <div class="col-sm-4 text-center">
        {{ HTML::image( 'img/product-3.png', 'logo-small', array( 'class' => 'product-image' ) ) }} 
        <p><strong>GNT FIBER @ 30 sachet</strong></p>
        <p>Harga: Rp. 500.000</p>
      </div>
    </div>
  </div>

  <div id="gnt-advantages" class="container-fluid">
    <div class="row">
      <div id="profile-banner" class="col-sm-12">
          <h1 class="testimonial-title text-white text-center">Keunggulan GNT</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <ul>
          <li>Perusahaan MLM yang baru saja berdiri</li>
          <li>Walaupun baru saja berdiri, GNT sudah masuk ke dalam 10 besar perusahaan Direct Selling dunia</li>
          <li>Punya produk-produk unggulan dengan nilai jual tinggi</li>
          <li>Punya Marketing Plan terbaik yang pernah ada</li>
          <li>Sudah punya kantor di 34 negara</li>
          <li>Menyediakan Web Replika yang bisa dipakai untuk menjual produk atau merekrut distributor baru di 24 negara</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div id="article-title" class="col-sm-12">
        Artikel
      </div>
    </div>
    <div class="row">
      <div class="col-sm-4">
        {{ HTML::image( 'img/artikel-1.jpg', 'logo-small', array( 'class' => 'artikel-image' ) ) }} 
        <p><strong>MLM Offline Bersama GNT</strong></p>
        <p>Bergabung menjadi distributor JM Ocean Avenue bersama kami, secara otomatis akan membawa Anda menjadi anggota sebuah komunitas yang luar biasa.</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'img/artikel-2.jpg', 'logo-small', array( 'class' => 'artikel-image' ) ) }} 
        <p><strong>MLM Offline Bersama GNT</strong></p>
        <p>Bergabung menjadi distributor JM Ocean Avenue bersama kami, secara otomatis akan membawa Anda menjadi anggota sebuah komunitas yang luar biasa.</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'img/artikel-3.jpg', 'logo-small', array( 'class' => 'artikel-image' ) ) }} 
        <p><strong>MLM Offline Bersama GNT</strong></p>
        <p>Bergabung menjadi distributor JM Ocean Avenue bersama kami, secara otomatis akan membawa Anda menjadi anggota sebuah komunitas yang luar biasa.</p>
      </div>
    </div>
  </div>
@stop
