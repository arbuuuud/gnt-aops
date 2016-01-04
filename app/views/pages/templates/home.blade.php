@extends('layouts.public')

@section('head-title')
Home
@stop

@section('content')
  <div id="main-banner">
    {{ HTML::image( 'img/mainbanner.png', 'main-banner', array( 'class' => 'banner-image' ) ) }}
    <div class="container">
      <div class="row">
        <div id="registration-box" class="col-sm-4">
          {{ Form::open(array('url' => 'peluang')) }}
            <h1 class="registration-box text-center">
              <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
              <br/>
              Peluang Terbaik Untuk Meningkatkan Kesejahteraan Hidup Anda
              <hr/>
            </h1> 
            <h2 class="registration-box text-center">
              Dapatkan informasi mengenai peluang bisnis TERBAIK hanya dengan memberikan informasi nama, email dan no. tlp Anda sekarang juga!
            </h2> 
            {{ Form::text('full_name', Input::old('full_name'), array('class'=>'form-control','placeholder'=> 'Nama Lengkap')) }}
            {{ Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder'=> 'Email')) }}
            {{ Form::text('phone_number', Input::old('phone_number'), array('class'=>'form-control','placeholder'=> 'No. Telepon')) }}

            <button id="registration-box-submit">
              Saya Tertarik!
            </button>
          {{ Form::close() }}
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1 class="title">
          GNT Club adalah satu-satunya solusi yang paling siap membantu Anda atau siapapun, termasuk orang awam untuk meningkatkan kesejahteraan hidup karena:
        </h1>
      </div>        
    </div>
    <div id="small-items" class="row">
      <div class="col-sm-4">
        {{ HTML::image( 'img/logo-ecommerce.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
          Sistem Prospek
        </h1>
        <p class="text-center">Anda tidak perlu membuat website, dan mempersiapkan infrastruktur sendiri yang sangat rumit dan mahal</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'img/logo-box.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Produk Mutakhir
        </h1>
        <p class="text-center">Produk yang sangat laku dan dicari-cari orang di seluruh dunia, sehingga Anda Tidak perlu melakukan riset dan mencari supplier lagi.</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'img/logo-money.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Potensi Income $100.000
        </h1>
        <p class="text-center">Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.</p>          
      </div>
    </div>
    <div id="subscribe-row" class="row">
      <a href="{{ url('peluang') }}">
        <div id="subscribe-button">
        Klik Disini Untuk Isi Formulir
        </div>
      </a>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div id="peluang-textbanner" class="col-sm-12 text-center">
        <h1 class="peluang-textbanner text-center"> 
          Pilihan produk kami
        </h1>
      </div>
    </div>
  </div>
  <div class="container">
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
    <div id="subscribe-row" class="row">
      <a href="{{ url('peluang') }}">
        <div id="subscribe-button">
        Klik Disini Untuk Isi Formulir
        </div>
      </a>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <h1 class="title text-center">JANGAN Bergabung Jika</h1>
        <span>Karena sistem GNT adalah paket bisnis yang sangat serius dan berpotensi mendongkrak penghasilan Anda dengan CEPAT (dari Rp.1juta... Rp.5juta... Rp.10juta... Rp.50juta... Rp.100juta ... dan seterusnya) walaupun Anda hanya mengerjakannya secara sambilan, maka sebaiknya Anda tidak perlu bergabung jika:</span>
      </div>
      <div class="col-sm-6">
        <ul id="mainpage-tick">
            <li>Anda Hanya Coba-Coba</li>
            <li>Anda tidak bersedia mengikuti instruksi dalam membangun bisnis ini</li>
            <li>Anda hanya menginginkan bisnis cepat kaya tanpa harus kerja</li>
            <li>Anda tidak punya smartphone atau koneksi internet</li>
            <li>Anda sudah member GNT</li>
        </ul>
      </div>
      <div class="col-sm-6">
        {{ HTML::image( 'img/banner-top.png', 'logo-small', array( 'class' => 'banner-image' ) ) }}  
      </div>
    </div>
    <div id="subscribe-row" class="row">
      <a href="{{ url('peluang') }}">
        <div id="subscribe-button">
        Klik Disini Untuk Isi Formulir
        </div>
      </a>
    </div>
  </div>
  <div id="testimonial-box">
    <div class="container">
      <h1 class="text-center text-white">
        Bergabunglah dengan <strong>10.000</strong> anggota kami yang terus berkembang setiap saat..
      </h1>
      <div class="row homepage-members">
        <div class="col-md-12">
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
          <a href="#" data-toggle="tooltip" data-placement="top" title="Anggota">
            <img src="http://lorempixel.com/g/100/100/people/">
          </a>
        </div>
      </div>
      <!-- <div class="row">
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
      </div> -->
    </div>
  </div>
@stop