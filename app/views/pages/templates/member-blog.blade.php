@extends('layouts.public')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-md-4">
    		<div class="panel box-shadow">
			    
			    <div class="panel-body">
			    	<div class="profil-user text-center">
			    		{{ HTML::image( 'img/leaders/A-C-160_205-zulkifli-hasan-1412759346.jpg', 'MPR', array( 'style' => 'height:200px', 'class' => 'img-rounded' ) ) }}
			    		<h3 class="text-uppercase text-brown"><strong>Zulkifli Hasan</strong> </h3>
			        	<h5><strong>Ketua MPR RI</strong> </h5>
			    	</div>
			    	<div class="profil-user-bio">
			    		<div class="page-header">
						  <h4>Biodata</h4>
						</div>
			    		<dl>
						  <dt>Nama Lengkap</dt>
						  <dd>Zulkifli Hasan</dd>
						</dl>
						<dl>
						  <dt>No. Anggota</dt>
						  <dd>A-468</dd>
						</dl>
						<dl>
						  <dt>Tempat / Tgl Lahir</dt>
						  <dd>LAMPUNG, 17 Mei 1962</dd>
						</dl>
						<dl>
						  <dt>Daerah Pemilihan</dt>
						  <dd>LAMPUNG-I</dd>
						</dl>
						<dl>
						  <dt>Partai / Provinsi</dt>
						  <dd>
						  	<a href="{{ URL::to('pages/pan') }}">Partai Amanat Nasional<br/>
						  	{{ HTML::image( 'img/fraksi/pan.jpg', "PAN", array( 'width' => '100px', 'class' => 'img-thumbnail') ) }}</a>
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Pendidikan</dt>
						  <dd>
						  	<ul>
						  		<li>SD Lampung, Lampung</li>
						  		<li>SMP Lampung, Lampung</li>
						  		<li>SMA Negeri 53, Jakarta</li>
						  		<li>S1-Ekonomi Universitas Krisnadwipayana, Jakarta</li>
						  		<li>S2-Manajemen PPM, Jakarta, 2003</li>
						  	</ul>
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Pekerjaan</dt>
						  <dd>
						  	<ul>
						  		<li>Komisaris Utama PT. Panamas Mitra Inti Lestari Jakarta, 2004-2006</li>
						  		<li>Anggota DPR/MPR RI Fraksi PAN 2004-2009</li>
						  		<li>Ketua Fraksi PAN DPR/MPR RI 2006-2009</li>
						  		<li>Menteri Kehutanan 2009-2014</li>
						  		<li>Ketua MPR RI 2014-2019</li>
						  	</ul>
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Organisasi</dt>
						  <dd>
						  	<ul>
						  		<li>Ketua Ikatan Alumni PPM, 2006-2008</li>
						  		<li>Ketua Komite Tetap KADIN, 2008-2013</li>
						  		<li>Ketua Dewan Pembina Ikatan Alumni PPM 2008-2010</li>
						  	</ul>
						  </dd>
						</dl>
			    	</div>
			    </div>

			</div>
		</div>
		<div class="col-md-8">

			@foreach($latest_siaran_pers as $post)
	          <div class="post row">
	            @if($post->image)
	            <div class="post-media col-md-3 col-sm-3 col-xs-3">
	                <a href="{{asset('uploads/'.$post->image)}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
	                  {{ HTML::image( 'uploads/'.$post->image, $post->title, array( 'class' => 'post-object' ) ) }}
	                </a>
	            </div>
	            @endif
	            <div class="post-body {{ $post->image ? 'col-md-9 col-sm-3 col-xs-9' : 'col-md-12' }}">
	                <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
	                <h4 class="post-heading"><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></h4>
	                {{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}
	            </div>
	          </div>
	        @endforeach
	        
	        {{-- pagination --}}
	        <div class="text-center">
	          {{ $latest_siaran_pers->links() }}
	        </div>

	        <div class="text-right">
	            <h5><a href="{{URL::to('category/siaran-pers')}}" class="text-brown">Lihat Semua &raquo;</a></h5>
	        </div>

	        <div id="karikatur-content">

	        	<h4 class="btn-red text-uppercase">Galeri Foto</h4>

	        	<div class="row">
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_1.jpg')}}" data-lightbox="image-karikatur_1">
		          	 {{ HTML::image( 'img/karikatur/karikatur_1.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_2.jpg')}}" data-lightbox="image-karikatur_2">
		          	 {{ HTML::image( 'img/karikatur/karikatur_2.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_3.jpg')}}" data-lightbox="image-karikatur_3">
		          	 {{ HTML::image( 'img/karikatur/karikatur_3.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		        </div>

		        <div class="row" style="margin-top:10px;">	          
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_1.jpg')}}" data-lightbox="image-karikatur_1">
		          	 {{ HTML::image( 'img/karikatur/karikatur_1.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_2.jpg')}}" data-lightbox="image-karikatur_2">
		          	 {{ HTML::image( 'img/karikatur/karikatur_2.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		          <div class="col-md-4 col-xs-4">
		            <a href="{{asset('img/karikatur/karikatur_3.jpg')}}" data-lightbox="image-karikatur_3">
		          	 {{ HTML::image( 'img/karikatur/karikatur_3.jpg', 'MPR', array( 'class' => 'karikatur img-thumbnail' ) ) }}
		            </a>
		          </div>
		        </div>

	          <div class="col-md-12">
	            <h5><a href="#" class="text-brown pull-right">Lihat Semua &raquo;</a></h5>
	          </div>
	        </div>

		</div>
	</div>
</div>
@stop