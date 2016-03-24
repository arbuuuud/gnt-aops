@extends('layouts.newmember')

@section('content')
<div class="row">
	<div class="col-md-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Sistem Prospek GNT</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
								<div class="col-sm-12">
									<p>Hallo, Rengga</p>

									<p>GNTClub.com adalah sebuah media online untuk menjual produk, merekrut distributor baru, dan membimbing para distributor GNT Club sehingga menjadi pembangun jaringan secara online.</p>

									<p>Anda sudah terdaftar sebagai member GNT Club, silakan beritahu peluang bisnis ini kepada teman, keluarga, dan kerabat anda. Caranya adalah dengan mempromosikan web replika berikut:</p>		
								</div>
								<div class="col-sm-12">
									<div class="thumbnail">
										{{ HTML::image( 'img/web_replika.png', 'Website Replika' ) }}
										<div class="caption">
											<h3><a href="{{Sysparam::getValue('web_replika')}}{{Auth::user()->last_name}}" title="Website Replika" target="_blank">{{url('@'.Auth::user()->last_name)}}</a></h3>
											<p>
												<a href="#" class="btn btn-primary" role="button">Lihat &raquo;</a>
											</p>
										</div>
									</div>
								</div>

							<div class="col-sm-12">
								<p>Pada website replika Anda, pengujung diharapkan untuk mengisi alamat informasi data diri yang kemudian akan disimpan ke dalam sistem. Untuk setiap data prospek yang di dapatkan, sistem akan mengirimkan email secara berkala mengenai berbagai informasi untuk mengajak prospek bergabung di jaringan Anda.</p>

								<p>Prospek dapat langsung bergabung melalui tombol 'Saya Ingin Bergabung!' yang ada di setiap email yang dikirimkan.</p>
							</div>
							<div class="col-sm-12">
								<div class="thumbnail">
									{{ HTML::image( 'img/email_action.png', 'Email Campaign' ) }}
								</div>
							</div>


						</div>
				</div><!--end row-->
			</div>
		</div>
	</div>

	<div class="col-sm-6">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Upload foto dan Welcome Message anda</h3>
			</div>
			<div class="row">
				<div class="col-sm-12">
					
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


				{{ Form::open(array('class' => 'form form-bordered', 'route' => array('member.post'), 'files' => true)) }}

				{{ link_to_route('member.post', 'Cancel', null,array('class' => 'btn btn-default')) }}
				<button type="submit" class="btn green"><i class="fa fa-check"></i> Save</button>

				<div class="form-body form-horizontal">
					
					
					<div class="form-group">
						{{ Form::label('title', 'Konten:', array('class'=>'col-md-2 control-label')) }}
				        <div class="col-sm-10">
				        	<textarea name="welcome_message" id="summernote_1"></textarea>
							<span class="help-block">Anda bisa menggunakan standar HTML syntax jika diperlukan</span>
						</div>
					</div>
				  <div class="form-group">
						{{ Form::label('image', 'Foto Utama:', array('class'=>'col-md-2 control-label')) }}
				      <div class="col-sm-10">
				      	{{ Form::file('image') }}
						  </div>
					</div>
				</div>


				</div>
			</div>

		</div>
	</div>
</div>
<!--div class="row">
	<div class="col-md-4">
		<h2 class="page-header text-center">
			Jaringan Anggota
		</h2>
		@if(isset($htmltree))
			{{$htmltree}}
		@endIf
	</div>
	<div class="col-md-8 text-center">
		<h2 class="page-header">
			Daftar Kontak Terbaru
		</h2>
		<table class="table display" id="tableone">
				<thead>
					<tr>
						<th class="text-center">Member Name</th>
						<th class="text-center">First Name</th>
						<th class="text-center">Last Name</th>
						<th class="text-center">Last Followed Up</th>
					</tr>
				</thead>
				<tbody>
				@if($contacts)
				@foreach($contacts as $contact)
					<tr>
						<td>{{$contact->user->first_name}}</td>
						<td>{{$contact->first_name }}</td>
						<td>{{$contact->last_name}}</td>
						<td>{{$contact->last_follow_up}}</td>
					</tr>
				@endforeach
				@endIf
				</tbody>
			</table>
	</div>
</div-->
@stop