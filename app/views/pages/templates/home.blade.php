@include('includes.html-head')

@section('head-title')
{{$page->title}}
@stop

  <div id="main-banner" class="container-fluid">
    <div class="container-fluid">
      <div class="row">

        <div class="visible-xs col-xs-12">
          <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
        </div>

        <div id="registration-box" class="col-sm-4 col-xs-12">
          {{ Form::open(array('url' => 'registercontact')) }}
            <h1 class="registration-box">
              Peluang Terbaik Untuk Meningkatkan Kesejahteraan Hidup Anda
            </h1> 
            <h2 class="registration-box">
            	Silakan DAFTAR DISINI untuk memulai perjalanan Anda menuju kesuksesan dan kesehatan.
            </h2> 

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
              </ul>
            </div>
            @endif
            
            {{ Form::hidden('member_id',$member->member_id) }}
            {{ Form::text('nama_lengkap', Input::old('nama_lengkap'), array('class'=>'form-control','placeholder'=> 'Nama Lengkap')) }}
            {{ Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder'=> 'Email')) }}
            {{ Form::text('no_telepon', Input::old('no_telepon'), array('class'=>'form-control','placeholder'=> 'No. Telepon')) }}

            <button id="registration-box-submit">
              Saya Tertarik!
            </button>
          {{ Form::close() }}
            <h2 class="registration-box">
              <i>Di halaman selanjutnya Anda akan mendapatkan informasi peluang terbaik yang dapat merubah seluruh hidup Anda, ayo tunggu apa lagi!</i>
            </h2>
        </div>

        <div class="col-sm-2 col-sm-offset-6 col-xs-12 hidden-xs">
          <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
        </div>

      </div>
    </div>
  </div>
</div><!--end .row-->

@if($member->welcome_message)
<div class="container" id="welcome_member_message">
  <div class="row">
    <div class="col-md-12">
       <h1 class="testimonial-title text-center text-capital color-blue">Welcome</h1>
       {{$member->welcome_message}}
        <div class="media">
          <div class="media-left">
             {{ HTML::image( $member->welcome_photo, $member->name, array( 'class' => 'media-object img-circle', 'height' => '150px' ) ) }} 
          </div>
          <div class="media-body">
            <h4 class="media-heading"><strong>{{$member->name}}</strong></h4>
            <p>GNT Club Member<br/>{{$member->welcome_phone_number}}</p>
          </div>
        </div>
      </div>
  </div>
</div>
@endif

<div id="homepage-gray-background" class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 text-center">
        <h1 class="title">
          Sistem GNT adalah Satu-satunya solusi yang paling siap membantu Anda atau siapapun, termasuk orang awam untuk menjadi pengusaha ecommerce sukses karena:        </h1>
      </div>        
    </div>
    <div id="small-items" class="row">
      <div class="col-sm-4">
        {{ HTML::image( 'images/cart.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
          Sistem E-Commerce Terintegrasi
        </h1>
        <p class="text-center">Mulai dari pemesanan, data pelanggan sampai pembayaran komisi bisa anda lihat secara online</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'images/box.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Produk
            <br />
			 Eksklusif
        </h1>
        <p class="text-center">Bermutu tinggi yang sangat dicari baik pria maupun wanita, tua dan muda (high demand)</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'images/money.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Potensi Income 
            <br />
            200 Miliar
        </h1>
        <p class="text-center">Menciptakan peluang jaringan yang solid dan menguntungkan untuk Distributor melalui Marketing Plan yang unik dan sistematis.</p>          
      </div>
    </div>
    <!--div class="col-sm-12 text-center space-buffer">
      <p>Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.</p>
    </div-->
  </div>
</div>
  <div class="container-fluid">
      <div class="row">
        <div id="testimonial-banner">
          <div class="container">
            <div id="testimonial-content" class="row">
              <div class="col-sm-12">
                <h1 class="testimonial-title text-white text-center text-capital">Apa kata mereka?</h1>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-2 col-xs-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-9 col-xs-8 testimonial-text">
                    <p class="text-white">“Bisnis GNT Club sangat mudah dijalankan karena kekuataannya adalah sistemnya E-commerce and Online based, produknya mempunyai keunggulan dan High Quality. Sehingga belum ada produk lain yang bisa mengalahkan keunggulannya. Jadi dengan hanya mengandalkan produk dan system promosi online... bisnis ini bisa berpotensi miliaran.”</p>
                    <p class="text-yellow">- Tri Agung S.</p>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-2 col-xs-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-9 col-xs-8 testimonial-text">
                    <p class="text-white">“Sebagai orang yang sudah berumur di atas 30 tahun saya ingin agar tetap bugar dan istri ingin tetap terli- hat muda. Ke ka saya mendapat undangan ke seminar peluang bisnis tentang produk an  aging maka saya coba iku . Di samping mendapat penjelasan singkat tentang produknya, ternyata ada yang sangat menarik tentang peluang bisnisnya. Peluang bisnis dengan sistem yang kelihatannya sangat mudah dijalankan karena  dak harus sering ketemu calon prospek. Dengan sistem yang sedemikian maka saya op mis bisa sukses di bisnis ini.”</p>
                    <p class="text-yellow">- Dwi Novandy</p>
                  </div>
              </div>  
              <div class="col-sm-12">
                  <div class="col-sm-2 col-xs-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-9 col-xs-8 testimonial-text">
                    <p class="text-white">“Saya tertarik dengan peluang bisnis yang ditawarkan GNT Club, dengan kekuatan networking, ecommerce & dropshipping. Sebenarnya semua jenis product akan bisa berkembang luar biasa jika bisa dijalankan dengan konsep ini akan luar biasa."</p>
                    <p class="text-yellow">- Rita Natalia</p>
                  </div>
              </div> 
            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <h1 class="testimonial-title text-center color-blue">GNT PROFILE</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div id="profile-content" class="col-sm-12">
          <p>PT Guna Natur Tulen berdiri pada Januari 2012 yang merupakan perusahaan modernisasi yang besar dengan menggabungkan span.color-bluepenelitian dan pengembangan, pemasaran/penjualan dan pelayanan menjadi satu kesatuan dengan menyediakan <strong>produk makanan kesehatan (Health Food)</strong>, <strong>perawatan harian (Personal Care)</strong>, <strong>kecantikan (Beauty Care).</strong></p>
          <div class="row">
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo1.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo2.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo3.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo4.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo5.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2 col-xs-2">
              {{ HTML::image( 'images/logo6.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
</div>
 
@include('includes.footer')