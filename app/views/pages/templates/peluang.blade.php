@extends('layouts.public')

@section('head-title')
{{$page->title}}
@stop

@section('content')
<div id="peluang-main-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2 col-sm-offset-5">
        <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
      </div>
      <div class="col-md-3">
        @include('includes.main-nav')
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="peluang-banner-text">
          <h2 class="peluang text-white">Perhatian : Semua Pebisnis, Karyawan & Apapun profesi Anda!</h2>
          <h2 class="peluang text-white">"Bagaimana Jika Hari Ini, Anda Bisa Meraih Impian Terbesar Anda Dengan Memiliki Bisnis Sendiri?"</h2>
          <h2 class="peluang text-white">Selamat, Anda telah masuk ke sini. Kami siap memberikan solusi atas berbagai masalah Anda. Solusi yang kami tawarkan di sini adalah, sebuah bisnis, yang bisa Anda jalankan selagi Anda masih bekerja. </h2>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="background-grey">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1 class="testimonial-title text-center color-blue">MLM Online Bersama GNT Club</h1>
            <hr style="width:200px;border: 2px solid #118E96;">
            <p>Melalui website ini, Anda dapat berbelanja produk-produk GNT dan menjadi distributor perusahaan ini.</p>
            <p>Tidak hanya itu, setelah menjadi distributor Anda juga bisa menggunakan website GNT Club untuk menjual produk-produk GNT dan merekrut distributor baru, keduanya secara online. Silakan mendaftar di sini jika Anda ingin menjadi distributor GNT dan memanfaatkan fasilitas-fasilitas website ini.</p>
            <p>Anda akan mendapatkan kemudahan dalam mengerjakan bisnis MLM Online bersama GNT Club. Kami menyediakan Automatic Online Prospecting (AOP), yang link-nya memuat kode referral Anda. Teman-teman Anda yang meng-klik link artikel, dan kemudian bergabung menjadi distributor GNT, secara otomatis akan menjadi downline Anda.</p>
            <p>Bagi Anda yang hanya ingin menjadi affiliate, kami menyediakan komisi untuk setiap distributor baru yang bergabung melalui link referral Anda. Silakan mendaftar di sini jika Anda ingin menjadi Affiliate.</p>
        </div>
      </div>
  </div>
</div>
<div class="background-white">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="testimonial-title text-center color-blue">Mungkin Anda sedang mengalami ini?</h1>
          <hr style="width:200px;border: 2px solid #118E96;">
          <ul class="fa-ul">
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Lagi cari-cari peluang bisnis online yang bisa dikerjakan sambil bekerja? tapi bingung mana yang benar & legal sesuai aturan hukum RI saking banyaknya bisnis ilegal & masyarakat tidak paham tentang bisnis yang resmi?</li>
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Ingin dapat passive income dari network marketing tapi kok ANTI MLM? bosan ditawari MLM? muak kalau dengar MLM? terjebak Money Game? sebel di prospek & di kejar-kejar member MLM?</li>
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Ingin punya bisnis online & offline yang bisa diwariskan? karena sangat mengerti tidak semua keluarga anda punya kemampuan/ keahlian untuk hasilkan uang seperti anda?</li>
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Ingin memiliki bisnis dengan potensi "unlimited residual income" dengan modal kecil mulai dari 2,85 juta dapat produk yang bisa dijual online + aneka fasilitas PREMIUM dengan gratis?</li>
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Ingin bisa jualan online tapi belum bisa punya stok produk, packing & delivery karena keterbatasan modal & waktu?</li>
            <li><i class="fa-li fa fa-question" aria-hidden="true"></i>Ingin punya teman-teman di pelosok Indonesia hingga luar negeri di komunitas online yang POSITIF & bersedia berbisnis dengan hati dengan memberi value & manfaat bagi banyak orang? serta uang bukan "satu-satunya" tujuan utamanya.</li>
          </ul>
        </div>
      </div>
  </div>
</div>
<div class="background-grey">
  <div class="container">
      <h1 class="testimonial-title text-center color-blue">Siap Dengan Cara Revolusioner Membangun Bisnis Sendiri?</h1>
      <hr style="width:200px;border: 2px solid #118E96;">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <p>Inilah solusi untuk semua permasalahan diatas, yukkk gabung dengan komunitas kami, komunitas GNT Club! Anda akan belajar bersama-sama cara memasarkan produk-produk Network Marketing dari PT Guna Natur Tulen yang memiliki NICHE MARKET yang sungguh unik melalui internet maupun offline.</p>

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
          <h1 class="testimonial-title text-center color-blue">Keunggulan GNT</h1>
          <hr style="width:200px;border: 2px solid #118E96;">

        <div class="row">
          <div class="col-md-8">
            <ul>
              <li>Perusahaan MLM yang baru saja berdiri</li>
              <li>Punya produk-produk unggulan dengan nilai jual tinggi</li>
              <li>Punya Marketing Plan terbaik yang pernah ada</li>
              <li>Menyediakan Web Replika yang bisa dipakai untuk menjual produk atau merekrut distributor baru</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="background-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div id="article-title">Articles</div>
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
@stop