@extends('layouts.'.Auth::user()->roleString())
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            Informasi Kontak
        </h3>
        @if (Session::get('message'))
        <div class="alert alert-success">
            <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
        </div>
        @endif
        <div class="tabbable-line">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab">Informasi Umum</a></li>
            <li role="presentation"><a href="#history" aria-controls="profile" role="tab" data-toggle="tab">Email Keluar</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="details">
                <div class="">
                    <ul class="list-group">
                        <li class="list-group-item"><b>Nama :</b> {{$contact->full_name}}</li>
                        <li class="list-group-item"><b>Email :</b> {{$contact->email}}</li>
                        <li class="list-group-item"><b>No. Tlp :</b> {{$contact->phone_number}}</li>
                        <li class="list-group-item"><b>Last Follow-up :</b> {{date('d F Y - H:i',strtotime($contact->last_follow_up))}}</li>
                        <li class="list-group-item"><b>Metode Follow-up :</b> {{$contact->isAutomaticFollowUp == '1' ? 'Automatic' : 'Manual' }}</li>
                        <li class="list-group-item"><b>Status :</b> {{$contact->active == '1' ? 'Aktif' : 'Tidak Aktif'}}</li>
                    </ul>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="history">
                <table class="table mpr_datatable">
                <thead>
                    <tr>
                        <th>Template Email</th>
                        <th>Tanggal Pengiriman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($email_histories as $email_history)
                    <tr>
                        <td><a href="{{url('showemail/'.$email_history->template->id)}}" target="_blank">{{$email_history->template->subject}}</a></td>
                        <td>{{date('d F Y - H:i', strtotime($email_history->date_sent))}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
          </div>
        </div>

    </div>
</div>
@stop