@extends('layouts.'.Auth::user()->roleString())
@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            Contact Details
        </h3>
        @if (Session::get('message'))
        <div class="alert alert-success">
            <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
        </div>
        @endif
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#history" aria-controls="profile" role="tab" data-toggle="tab">Outbox</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active container-fluid portlet box grey-cascade" id="details">
                <div class="portlet-title">
                    <div class="caption">
                     Contact Details for {{$contact->full_name}}
                    </div>
                </div>
                <div class="portlet-body">
                    <p>Full Name : {{$contact->full_name}}</p>
                    <p>Email : {{$contact->email}}</p>
                    <p>Phone Number : {{$contact->phone_number}}</p>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="history">
                <table class="table mpr_datatable">
                <thead>
                    <tr>
                        <th>Email Subject</th>
                        <th>Date Sent</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($email_histories as $email_history)
                    <tr>
                        <td><a href="{{url('showemail/'.$email_history->template->id)}}" target="_blank">{{$email_history->template->subject}}</a></td>
                        <td>{{date('d F, Y', strtotime($email_history->date_sent))}}</td>
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