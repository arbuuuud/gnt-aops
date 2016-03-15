@extends('layouts.public')

@section('head-title')
{{$page->title}}
@stop

@section('content')
<div class="container-fluid">

  <div class="row">
        <div id="peluang-main-banner"> 
  

        <div class="container-fluid">
            <div class="col-sm-2 col-sm-offset-5">
              <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
            </div>
            <div class="col-md-3">
              @include('includes.main-nav')
            </div>
        </div>
     
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div id="peluang-banner-text">
                  <h2 class="peluang text-tosca">Perhatian : Semua Pebisnis, Karyawan & Apapun profesi Anda!</h2>
                  <h2 class="peluang text-white">"Bagaimana Jika Hari Ini, Anda Bisa Meraih Impian Terbesar Anda Dengan Memiliki Bisnis Sendiri?"</h2>
                  <h2 class="peluang text-tosca">Selamat, Anda telah masuk ke sini. Kami siap memberikan solusi atas berbagai masalah Anda. Solusi yang kami tawarkan di sini adalah, sebuah bisnis, yang bisa Anda jalankan selagi Anda masih bekerja. </h2>

                  <div class="peluang-subscribe-button-huge text-center">
                    Mulai Sekarang!
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
          <hr style="width:200px;border: 2px solid #000;">
      </div>
    </div>
</div>
<div class="container-fluid">
      <div id="peluang-inner" class="col-sm-12">
        <div class="container">
          <div class="row">
          {{ HTML::image( 'images/logo-2.png', 'logo-image-peluang', array( 'class' => 'logo-image-peluang col-sm-5' ) ) }}
          <p class="text-yellow col-sm-9" style="font-size:28px;">Melalui website ini, Anda dapat berbelanja produk-produk GNT dan menjadi distributor perusahaan ini.</p>
          </div>
          <p class="text-white">Tidak hanya itu, setelah menjadi distributor Anda juga bisa menggunakan Gntclub.com untuk menjual produk-produk GNT dan merekrut distributor baru, keduanya secara online. Silakan mendaftar di sini jika Anda ingin menjadi distributor GNT dan memanfaatkan fasilitas-fasilitas website ini.</p>
          <p class="text-white">Anda akan mendapatkan kemudahan dalam mengerjakan bisnis MLM Online bersama Gntclub.com. Kami menyediakan artikel-artikel yang bisa Anda share ke sosial media (Facebook, Twitter, Google+, LinkedIn), yang link-nya memuat kode referral Anda. Teman-teman Anda yang meng-klik link artikel, dan kemudian bergabung menjadi distributor GNT, secara otomatis akan menjadi downline Anda.</p>
          <p class="text-white">Bagi Anda yang hanya ingin menjadi affiliate, kami menyediakan komisi untuk setiap distributor baru yang bergabung melalui link referral Anda. Silakan mendaftar di sini jika Anda ingin menjadi Affiliate.</p>
        </div>
      </div>
    </div>
</div>

<div class="container-fluid">

  <div class="background-grey">
    <div class="container-fluid">
            <h1 class="testimonial-title text-center">Mungkin Anda sedang mengalami ini?</h1>
            <hr style="width:200px;border: 2px solid #000;">
    </div>
    <div id="product-list" class="container">
      <div class="row">
        <div class="col-md-8">
          <ul id="peluang">
            <li>Lagi cari-cari peluang bisnis online yang bisa dikerjakan sambil bekerja? tapi bingung mana yang benar & legal sesuai aturan hukum RI saking banyaknya bisnis ilegal & masyarakat tidak paham tentang bisnis yang resmi?</li>
            <li>Pengen dapat passive income dari network marketing tapi kok ANTI MLM? bosan ditawari MLM? muak kalau dengar MLM? terjebak Money Game? sebel di prospek & di kejar-kejar member MLM?</li>
            <li>Pengen punya bisnis online & offline yang bisa diwariskan? karena sangat mengerti tidak semua keluarga anda punya kemampuan/ keahlian untuk hasilkan uang seperti anda?</li>
            <li>Pengen memiliki bisnis dengan potensi "unlimited residual income" dengan modal kecil mulai dari 185 ribu hingga 3,6 juta & dapat produk yang bisa dijual online + aneka fasilitas PREMIUM dengan gratis?</li>
            <li>Pengen bisa jualan online tapi belum bisa punya stok produk, packing & delivery karena keterbatasan modal & waktu?</li>
            <li>Pengen punya teman-teman di pelosok Indonesia hingga luar negeri di komunitas online yang POSITIF & bersedia berbisnis dengan hati dengan memberi value & manfaat bagi banyak orang? serta uang bukan "satu-satunya" tujuan utamanya.</li>
          </ul>
        </div>

        <div id="peluang-image-right" class="col-md-4 hidden-xs">
          {{ HTML::image( 'images/thoughtful-student-woman.png', 'confuse-man', array( 'class' => 'img-responsive' ) ) }} 
        </div>

      </div>
    </div>
  </div>

  <div class="background-white">
    <div class="container-fluid">
            <h1 class="testimonial-title text-center">Untuk memesan silakan KLIK gambar produk DIBAWAH</h1>
            <hr style="width:200px;border: 2px solid #000;">
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
  </div>
  
  <div class="background-grey">
    <div id="gnt-advantages" class="container-fluid">
            <h1 class="testimonial-title text-center">SIAP DENGAN CARA REVOLUSIONER 
  MEMBANGUN BISNIS SENDIRI?</h1>
            <hr style="width:200px;border: 2px solid #000;">
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <p>Inilah solusi untuk semua permasalahan diatas, yukkk gabung dengan komunitas kami, <strong>komunitas online GNT Club!</strong> Anda akan belajar bersama-sama cara memasarkan produk-produk Network Marketing dari PT Guna Natur Tulen yang memiliki NICHE MARKET yang sungguh unik melalui internet.</p>

          <p>Pembelajarannya melalui modul training online, facebook group, webinar (live broadcasting via internet) dan juga kopdar (belajar sambil kopi darat) berupa BOD Classroom (Bisnis Online Dasar) hingga IMC (Internet Marketing Classroom). BOD & IMC hanya ada di jaringan GNT Club diadakan di kantor marketing PT GNT Jakarta.</p>

          <p>Kami bangga menjadi bagian dari industri ONLINE NETWORK MARKETING yang telah mengubah kehidupan banyak orang from zero to hero! & kini giliran anda!</p>
        </div>
        <div class="col-md-4">
          {{ HTML::image( 'images/happy-people.png', 'logo-small', array( 'class' => 'img-responsive' ) ) }} 
        </div>
      </div>
    </div>
  </div>

  <div class="background-white">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1 class="testimonial-title text-center">KEUNGGULAN GNT</h1>
            <hr style="width:200px;border: 2px solid #000;">

          <div class="row">
            <div class="col-md-8">
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
      </div>
    </div>


    <div class="container">
      <div class="row">
        <div id="article-title" class="col-sm-12">
          Articles
        </div>
      </div>
      <div class="row">
        @foreach(Post::latest()->take(3)->get() as $post)
          <div class="col-sm-4">
            @if($post->image)
            <a href="{{asset($post->image)}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
              {{ HTML::image( $post->image, $post->title, array( 'class' => 'artikel-image' ) ) }}
            </a>
            @else
              {{ HTML::image( 'img/default-pic.jpg', $post->title, array( 'class' => 'artikel-image' ) ) }}
            @endif
            <div class="article-box">
              <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
              <div class="addthis_toolbox addthis_default_style" addthis:title="{{$post->title}}" addthis:description="{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}" addthis:url="{{URL::to('posts/'.$post->slug)}}" style="display:inline-block;margin-left:10px;">
                <a class="addthis_button_compact"></a>
                <a class="addthis_counter addthis_bubble_style"></a>
              </div>
              <p><a href="{{URL::to('posts/'.$post->slug)}}"><strong>{{$post->title}}</strong></a></p>
              {{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>

<div id="subscribe-bottom" class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
        <div class="row">
              <h1 class="testimonial-title text-center text-white">
                Bergabunglah dengan 10.000 anggota kami yang terus berkembang setiap saat..
              </h1>
        </div>
        <div class="row">
          <div class="subscribe-button-superhuge text-center">
            Klik disini untuk bergabung
          </div> 
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>

@stop
