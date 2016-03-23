@extends('layouts.newmember')

@section('content')
<div class="row">
	<div class="col-md-12">

		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Sistem Prospek GNT</h3>
			</div>
			<div class="panel-body">
				<p>Hallo, Rengga</p>

				<p>GNTClub.com adalah sebuah media online untuk menjual produk, merekrut distributor baru, dan membimbing para distributor GNT Club sehingga menjadi pembangun jaringan secara online.</p>

				<p>Anda sudah terdaftar sebagai member GNT Club, silakan beritahu peluang bisnis ini kepada teman, keluarga, dan kerabat anda. Caranya adalah dengan mempromosikan web replika di bawah ini:</p>		
				
				<div class="row">
					<div class="col-md-6">
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
				</div>

				<p>Pada website replika Anda, pengujung diharapkan untuk mengisi alamat informasi data diri yang kemudian akan disimpan ke dalam sistem. Untuk setiap data prospek yang di dapatkan, sistem akan mengirimkan email secara berkala mengenai berbagai informasi untuk mengajak prospek bergabung di jaringan Anda.</p>

				<p>Prospek dapat langsung bergabung melalui tombol 'Saya Ingin Bergabung!' yang ada di setiap email yang dikirimkan.</p>

				<div class="row">
					<div class="col-md-6">
						<div class="thumbnail">
							{{ HTML::image( 'img/email_action.png', 'Email Campaign' ) }}
						</div>
					</div>
				</div>
				
			</div>
		</div>

	</div>
</div>
<div class="row">
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
</div>
@stop