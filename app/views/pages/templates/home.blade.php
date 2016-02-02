@include('includes.html-head')

<div id="top-content">
  <div id= "top-bar"></div>
  <div id="logo-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-5">
          <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="bottom-content">
  <div id="main-banner" class="container-fluid">
    <div class="container-fluid">
      <div class="row">
        <div id="registration-box" class="col-sm-4">
          {{ Form::open(array('url' => 'registercontact')) }}
            <h1 class="registration-box">
              Peluang Terbaik Untuk Meningkatkan Kesejahteraan Hidup Anda
            </h1> 
            <h2 class="registration-box">
              Dapatkan informasi mengenai peluang bisnis TERBAIK hanya dengan memberikan informasi nama, email dan no. tlp Anda sekarang juga!
            </h2> 

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
              </ul>
            </div>
            @endif
            
            {{ Form::hidden('member_id',$memberid) }}
            {{ Form::text('full_name', Input::old('full_name'), array('class'=>'form-control','placeholder'=> 'Nama Lengkap')) }}
            {{ Form::text('email', Input::old('email'), array('class'=>'form-control','placeholder'=> 'Email')) }}
            {{ Form::text('phone_number', Input::old('phone_number'), array('class'=>'form-control','placeholder'=> 'No. Telepon')) }}

            <button id="registration-box-submit">
              Saya Tertarik!
            </button>
          {{ Form::close() }}
            <h2 class="registration-box">
              Di halaman selanjutnya Anda akan mendapatkan informasi peluang terbaik yang dapat merubah seluruh hidup Anda, ayo tunggu apa lagi! 
            </h2> 
        </div>
      </div>
    </div>
  </div>
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
          Sistem Prospek
        </h1>
        <p class="text-center">Anda tidak perlu membuat website, dan mempersiapkan infrastruktur sendiri yang sangat rumit dan mahal</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'images/box.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Produk Mutakhir
        </h1>
        <p class="text-center">Produk yang sangat laku dan dicari-cari orang di seluruh dunia, sehingga Anda Tidak perlu melakukan riset dan mencari supplier lagi.</p>
      </div>
      <div class="col-sm-4">
        {{ HTML::image( 'images/money.png', 'logo-small', array( 'class' => 'small-image' ) ) }}  
        <h1 class="title text-center">
            Potensi Income $100.000
        </h1>
        <p class="text-center">Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.</p>          
      </div>
    </div>
    <div class="col-sm-12 text-center space-buffer">
      <p>Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.Tanpa perlu kantor, dan tanpa perlu karyawan, bahkan Anda tidak perlu stok dan mengatur pengirimannya, karena semua menggunakan sistem Dropshipping.</p>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row">
        <div id="testimonial-banner">
          <div class="container">
            <div id="testimonial-content" class="row">
              <div class="col-sm-12">
                <h1 class="testimonial-title text-white">Apa kata mereka?</h1>
              </div>
              <div class="col-sm-6">
                  <div class="col-sm-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-8 testimonial-text">
                    <p class="text-white">“Semenjak minum GNT Fiber serat, BAB jadi lancar. Berasa kenyang lebih lama dan merasa lebih enteng dibagian perutku. Berat badan 72 turun ke 69 hanya dalam 1 bulan.”</p>
                    <p class="text-green">Victor Tjahja, 35, wiraswasta, Jakarta</p>
                  </div>
              </div>
              <div class="col-sm-6 testimonial-right">
                  <div class="col-sm-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-8 testimonial-text">
                    <p class="text-white">“Lantaran penasaran cerita teman jadi ikutan nyoba. BBku turun 3kg hanya dalam sebulan. Enggak bikin lemes, badan terasa ringan dan semakin sehat.”</p>
                    <p class="text-green">Willy R Khosuma, 25, Tobelo</p>
                  </div>
              </div>  
              <div class="col-sm-6">
                  <div class="col-sm-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-8 testimonial-text">
                    <p class="text-white">“Terima Kasih GNT FIBER saya senang sekali bisa menurunkan berat badan saya dengan cara yang mudah dan tidak menyiksa tubuh saya”</p>
                    <p class="text-green">Sonny Tulung, 45 tahun - Artis</p>
                  </div>
              </div>  
              <div class="col-sm-6 testimonial-right">
                  <div class="col-sm-4 testimonial-photo">
                    {{ HTML::image( 'images/testimonial-photo.png', 'logo-small', array( 'class' => 'testimonial-image' ) ) }}  
                  </div>
                  <div class="col-sm-8 testimonial-text">
                    <p class="text-white">“GNT Fiber ini sangat membantu. Baru minum teratur 2x sehari selama seminggu, celana langsung longgar”</p>
                    <p class="text-green">Sandi Wonodjojo, 30, wiraswasta, Jakarta</p>
                  </div>
              </div>    
            </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
          <h1 class="testimonial-title text-center">Apa itu GNT?</h1>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div id="profile-content" class="col-sm-12">
          <p>Didirikan pada tahun 2012, PT GUNA NATUR TULEN merupakan perusahaan perdagangan produk makanan/minuman kesehatan dengan merek dagang GNT FIBER.</p>
          <p>Dasar filosofi dari produk yang diperdagangkan PT GUNA NATUR TULEN di jabarkan dalam 3K, yakni…  </p>
             <ul>
              <li>Peduli pada KUALITAS</li>
              <li>Peduli pada KEAMANAN</li>
              <li>Peduli pada KESEHATAN</li>
            </ul>
          <div class="row">
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo1.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo2.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo3.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo4.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo5.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
            <div class="col-sm-2">
              {{ HTML::image( 'images/logo6.png', 'logo-small', array( 'class' => 'profile-image' ) ) }}  
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="subscribe-bottom" class="container-fluid">
  <div class="container">
    <div class="row">
          <h1 class="testimonial-title text-white text-center">Tunggu apalagi?<br>
            Ayo tingkatkan kualitas<br>
            hidup anda sekarang!
          </h1>
    </div>
    <div class="row">
      <div class="subscribe-button-huge text-center">
        Saya tertarik!
      </div> 
    </div>
  </div>
</div>
 
@include('includes.footer')