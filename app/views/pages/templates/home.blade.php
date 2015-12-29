@extends('layouts.public')

@section('head-title')
Home
@stop

@section('content')
<div class="container nopadding">
        <div id="main-banner">
          {{ HTML::image( 'img/mainbanner.png', 'main-banner', array( 'class' => 'banner-image' ) ) }}  
          <div id="registration-box" class="col-sm-4">
            <h1 class="registration-box">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit.
            </h1> 
            <h2 class="registration-box">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus laoreet cursus dui vitae gravida.
            </h2> 

          {{ Form::text('last_name', Input::old('last_name'), array('class'=>'form-control','placeholder'=> 'Nama Lengkap')) }}
          {{ Form::text('last_name', Input::old('last_name'), array('class'=>'form-control','placeholder'=> 'Email')) }}
          {{ Form::text('last_name', Input::old('last_name'), array('class'=>'form-control','placeholder'=> 'No. Telepon')) }}

            <button id="registration-box-submit">
              Daftar
            </button>
          </div>
        </div>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6">
          <h1 class="title">
          Franchise Online Store DASH2 adalah Satu-satunya solusi bisnis Toko Online/ eCommerce yang paling siap membantu Anda atau siapapun, termasuk orang awam untuk menjadi pengusaha ecommerce sukses karena:
          </h1>
      </div>        
    </div>
    <div id="small-items" class="row">
      <div class="col-sm-4">
          {{ HTML::image( 'img/logo-ecommerce.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
          <h1 class="title text-center">
              Sistem E-Commerce Ready
          </h1>
          <span class="text-center">Anda tidak perlu membuat website, dan mempersiapkan infrastruktur sendiri yang sangat rumit dan mahal</span>
      </div>
      <div class="col-sm-4">
          {{ HTML::image( 'img/logo-box.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
          <h1 class="title text-center">
              Produk Mutakhir
          </h1>
          <span class="text-center">Produk ANTI AGING yang sangat laku dan dicari-cari orang di seluruh dunia, sehingga Anda Tidak perlu melakukan riset dan mencari supplier lagi.</span>
      </div>
      <div class="col-sm-4">
          {{ HTML::image( 'img/logo-money.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
          <h1 class="title text-center">
              Potensi Income $100.000
          </h1>
          <span class="text-center">Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.</span>          
      </div>
    </div>

    <div id="subscribe-row" class="row">
      <div id="subscribe-button">
        Klik Disini Untuk Isi Formulir
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
        <h1 class="title text-center">JANGAN Bergabung Jika</h1>
        <span>Karena paket Franchise Online Store DASH2 adalah paket bisnis yang sangat serius dan berpotensi mendongkrak penghasilan Anda dengan CEPAT (dari Rp.1juta... Rp.5juta... Rp.10juta... Rp.50juta... Rp.100juta ... dan seterusnya) walaupun Anda hanya mengerjakannya secara sambilan, maka sebaiknya Anda tidak perlu bergabung jika:</span>
      </div>
      <div class="col-sm-6">
        <ul id="mainpage-tick">
            <li>Anda Hanya Coba-Coba</li>
            <li>Anda tidak bersedia mengikuti instruksi dalam membangun bisnis ini</li>
            <li>Anda hanya menginginkan bisnis cepat kaya tanpa harus kerja</li>
            <li>Anda tidak punya smartphone atau koneksi internet</li>
            <li>Anda tidak bersedia investasi paket Basic senilai Rp.2,6Jt untuk memiliki bisnis Franchise Online Store tanpa resiko, bahkan mendapatkan Total Bonus senilai Rp.237juta</li>
            <li>Anda sudah member Jeunesse</li>
        </ul>
      </div>
      <div class="col-sm-6">
        {{ HTML::image( 'img/banner-top.png', 'logo-small', array( 'class' => 'banner-image' ) ) }}  
      </div>
    </div>

    <div id="subscribe-row" class="row">
      <div id="subscribe-button">
        Klik Disini Untuk Isi Formulir
      </div>
    </div>

    <div class="row">
        <div id="testimonial-box" class="col-sm-12">
            <div class="col-sm-3 testimonial-photo">
              {{ HTML::image( 'img/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
            </div>
            <div class="col-sm-9">
              <h1 class="testimonial">
                  Jessica Jones
              </h1> 
              <h2 class="testimonial">
                  Phasellus laoreet cursus dui vitae gravida. Nam non eleifend ligula, vitae ultrices nisl.Lorem ipsum dolor sit amet.
              </h2> 
              <h3 class="testimonial">
                  CEO Lorem
              </h3> 
            </div>
        </div>
    </div>

</div>
@stop
