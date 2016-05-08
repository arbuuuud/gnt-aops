@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Sistem Prospek GNT Club</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
						<p>Halo {{Auth::user()->name}},</p>
						<p>GNTClub.com adalah sebuah media online untuk menjual produk, merekrut distributor baru, dan membimbing para distributor GNT Club sehingga menjadi pembangun jaringan secara online.</p>
						<p>Anda sudah terdaftar sebagai member GNT Club, silahkan beritahu peluang bisnis ini kepada teman, keluarga, dan kerabat anda.</p>
						<p>Caranya adalah dengan mempromosikan web replika berikut:</p>
						<div class="thumbnail">
							{{ HTML::image( 'img/web_replika.png', 'Website Replika' ) }}
							<div class="caption">
								<p>Alamat Web Replika Anda:</p>
								<p>
									<a href="{{Sysparam::getValue('web_replika')}}{{Auth::user()->username}}" class="btn btn-primary" role="button" target="_blank">{{Sysparam::getValue('web_replika')}}{{Auth::user()->username}}</a>
								</p>
							</div>
						</div>
						<p>Pada website replika Anda, pengujung diharapkan untuk mengisi alamat informasi data diri yang kemudian akan disimpan ke dalam sistem.</p>
						<p>Untuk setiap data prospek yang di dapatkan, sistem akan mengirimkan email secara berkala mengenai berbagai informasi untuk mengajak prospek bergabung di jaringan Anda.</p>
						<p>Prospek dapat langsung bergabung melalui tombol 'Saya Ingin Bergabung!' yang ada di setiap email yang dikirimkan.</p>
						<div class="thumbnail">
							{{ HTML::image( 'img/email_action.png', 'Email Campaign' ) }}
						</div>
						<p>Salam sukses,<br/>
							GNTClub.com</p>
					</div>
				</div><!--end row-->
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Isi Pesan Personal Web Replika Anda</h3>
			</div>
			<div class="panel-body">
				<div class="note note-success">
					<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
					<p>Pesan personal yang Anda berikan akan ditampilkan di halaman depan dari web replika Anda ketika dibuka oleh pengunjung / calon prospek.</p>
				</div>
				@if ($errors->any())
				<div class="alert alert-danger">
				  <ul>
				    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
				  </ul>
				</div>
				@endif
				@if (Session::get('message'))
				<div class="alert alert-success">
				    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
				</div>
				@endif
				{{ Form::open(array('class' => 'form form-bordered', 'route' => array('member.updateWelcomeMessage'), 'files' => true)) }}
				<div class="form-body">
					<div class="form-group">
						{{ Form::label('welcome_photo', 'Foto:', array('class'=>'control-label')) }}
						@if($member->welcome_photo)
					       <p>{{ HTML::image( $member->welcome_photo, NULL, array( 'style' => 'height:125px;','class' => 'media-object img-circle') ) }}</p>
					    @endif
				      	{{ Form::file('welcome_photo') }}
				      	<span class="help-block">Foto akan ditampilkan dengan ukuran maksimal tinggi 125 px</span>
					</div>
					<div class="form-group">
						{{ Form::label('welcome_phone_number', 'No. Tlp:', array('class'=>'control-label')) }}
				       	{{ Form::text('welcome_phone_number', $member->welcome_phone_number, array('class'=>'form-control')) }}
					</div>
					<div class="form-group">
						{{ Form::label('welcome_message', 'Welcome Message:', array('class'=>'control-label')) }}
				       	<textarea name="welcome_message" id="summernote_1">{{$member->welcome_message}}</textarea>
						<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
					</div>
					{{ link_to_route('member.dashboard', 'Cancel', null,array('class' => 'btn btn-default')) }}
					<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>
				</div>
			</div>
		</div>
	</div>
</div>
@stop