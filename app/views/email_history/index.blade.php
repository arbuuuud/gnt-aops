@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
	<div class="col-md-12">
		<h3 class="page-title">
			Email Log
		</h3>
		@if (Session::get('message'))
		<div class="alert alert-success">
		    <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
		</div>
		@endif
		<div class="note note-success">
			<h4 class="block"><i class="fa fa-info-circle"></i> Informasi</h4>
			<p>Disini Anda dapat melihat seluruh email log yang dikirim melalui sistem ke daftar kontak yang terdaftar.</p>
		</div>
		<div class="table-responsive">
			<table class="table mpr_datatable display" id="tableone">
                <thead>
                    <tr>
                        <th>Pengirim</th>
                        <th>Penerima</th>
                        <th>Template Email</th>
                        <th>Tanggal Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
               @if($email_histories)
                  @foreach($email_histories as $email_history)
                    <tr>
                        <td>{{$email_history->contact->user->name}}</td>
                        <td>{{$email_history->contact->full_name}}</td>
                        <td><a href="{{url('showemail/'.$email_history->template->id)}}" target="_blank">{{$email_history->template->subject}}</a></td>
                        <td>{{date('d F Y - H:i', strtotime($email_history->date_sent))}}</td>
                    </tr>
                    @endforeach
                @endIf
                </tbody>
            </table>
		</div>
	</div>
</div>
@stop