@extends('layouts.public')

@section('head-title')
{{$member->name}}
@stop

@section('content')
<div class="container">
    <div class="row">
    	@if($related_posts->count() || $related_galleries->count())
    	<div class="col-md-4">
    		<div class="panel box-shadow">
			    
			    <div class="panel-body">
			    	<div class="profil-user text-center">
			    		@if($member->image)
			    			{{ HTML::image($member->image, $member->name, array( 'style' => 'height:200px', 'class' => 'img-rounded' ) ) }}
			    		@else
			    			{{ HTML::image( 'img/default-members.jpg', $member->name, array( 'style' => 'height:200px', 'class' => 'img-rounded' ) ) }}
			    		@endif
			    		<h3 class="text-uppercase text-brown"><strong>{{$member->name}}</strong> </h3>
			        	<h5><strong>{{$member->organization_subposition}}</strong> </h5>
			    	</div>
			    	<div class="profil-user-bio">
			    		<div class="page-header">
						  <h4>Biodata</h4>
						</div>
			    		<dl>
						  <dt>Nama Lengkap</dt>
						  <dd>{{$member->name}}</dd>
						</dl>
						<dl>
						  <dt>No. Anggota</dt>
						  <dd>{{$member->number}}</dd>
						</dl>
						<dl>
						  <dt>Tempat / Tgl Lahir</dt>
						  <dd>{{$member->pob}}, {{$member->dob}}</dd>
						</dl>
						<dl>
						  <dt>Daerah Pemilihan</dt>
						  <dd>{{$member->area->name}}</dd>
						</dl>
						<dl>
						  <dt>Partai</dt>
						  <dd>
						  	{{$member->fraction->name}}<br/>
						  	{{ HTML::image($member->fraction->image, $member->fraction->name, array( 'width' => '100px', 'class' => 'img-thumbnail') ) }}
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Pendidikan</dt>
						  <dd>
						  	{{$member->riwayat_pendidikan or 'Tidak ada data ditemukan'}}
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Pekerjaan</dt>
						  <dd>
						  	{{$member->riwayat_pekerjaan or 'Tidak ada data ditemukan'}}
						  </dd>
						</dl>
						<dl>
						  <dt>Riwayat Organisasi</dt>
						  <dd>
						  	{{$member->riwayat_organisasi or 'Tidak ada data ditemukan'}}
						  </dd>
						</dl>
			    	</div>
			    </div>

			</div>
		</div>
		<div class="col-md-8">

			@if($related_posts->count())
				@foreach($related_posts as $post)
		          <div class="post row">
		            @if($post->image)
		            <div class="post-media col-md-3 col-sm-3 col-xs-3">
		                <a href="{{asset($post->image)}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
		                  {{ HTML::image( $post->image, $post->title, array( 'class' => 'post-object' ) ) }}
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
		        <div class="text-right">
		            <h5><a href="{{URL::to('anggota/blog/'.$member->slug)}}" class="text-brown">Lihat Semua &raquo;</a></h5>
		        </div>
		     @endif

	        @if($related_galleries->count())
	        <div id="karikatur-content">
	        	<h4 class="btn-brown text-uppercase">Galeri Foto</h4>
	        	@foreach ($related_galleries as $gallery)
				<div class="post row">
		            <div class="post-media col-md-3">
		            	@foreach($gallery->photos as $photo)
		            		<a href="{{asset($photo->image)}}" data-lightbox="image-{{$gallery->slug}}" data-title="{{$gallery->title}}">
								{{ HTML::image( $photo->image, $photo->title, array( 'data-description' =>  $photo->title, 'class' => 'img-responsive' ) ) }}
							</a>
							<?php break; ?>
						@endforeach
					</div>
		            <div class="post-body col-md-9">
		                <div class="post-date">{{ $gallery->translateDate($gallery->created_at) }}</div>
		                <h4 class="post-heading"><a href="{{URL::to('galeri/'.$gallery->slug)}}">{{$gallery->title}}</a></h4>
		            </div>
		        </div>
				@endforeach

				<div class="text-right">
					<h5><a href="{{URL::to('anggota/galeri/'.$member->slug)}}" class="text-brown">Lihat Semua &raquo;</a></h5>
				</div>
	        </div>
	        @endif
		</div>
		@else
			<div class="col-md-4">
				<div class="profil-user text-center">
		    		@if($member->image)
		    			{{ HTML::image($member->image, $member->name, array( 'style' => 'height:200px', 'class' => 'img-rounded' ) ) }}
		    		@else
		    			{{ HTML::image( 'img/default-members.jpg', $member->name, array( 'style' => 'height:200px', 'class' => 'img-rounded' ) ) }}
		    		@endif
		    		<h3 class="text-uppercase text-brown"><strong>{{$member->name}}</strong> </h3>
		        	<h5><strong>{{$member->organization_subposition}}</strong> </h5>
		    	</div>
			</div>
			<div class="col-md-4">
	    		<dl>
				  <dt>Nama Lengkap</dt>
				  <dd>{{$member->name}}n</dd>
				</dl>
				<dl>
				  <dt>No. Anggota</dt>
				  <dd>{{$member->number}}</dd>
				</dl>
				<dl>
				  <dt>Tempat / Tgl Lahir</dt>
				  <dd>{{$member->pob}}, {{$member->dob}}</dd>
				</dl>
				<dl>
				  <dt>Daerah Pemilihan</dt>
				  <dd>{{$member->area->name}}</dd>
				</dl>
				<dl>
				  <dt>Partai</dt>
				  <dd>
				  	{{$member->fraction->name}}<br/>
				  	{{ HTML::image($member->fraction->image, $member->fraction->name, array( 'width' => '100px', 'class' => 'img-thumbnail') ) }}
				  </dd>
				</dl>
			</div>
			<div class="col-md-4">
				<dl>
				  <dt>Riwayat Pendidikan</dt>
				  <dd>
				  	{{$member->riwayat_pendidikan or 'Tidak ada data ditemukan'}}
				  </dd>
				</dl>
				<dl>
				  <dt>Riwayat Pekerjaan</dt>
				  <dd>
				  	{{$member->riwayat_pekerjaan or 'Tidak ada data ditemukan'}}
				  </dd>
				</dl>
				<dl>
				  <dt>Riwayat Organisasi</dt>
				  <dd>
				  	{{$member->riwayat_organisasi or 'Tidak ada data ditemukan'}}
				  </dd>
				</dl>
			</div>
		@endif
	</div>
</div>
@stop