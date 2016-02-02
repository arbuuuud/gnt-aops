@extends('layouts.'.Auth::user()->roleString())

@section('content')
<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            Outbox
        </h3>
        @if (Session::get('message'))
        <div class="alert alert-success">
            <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table mpr_datatable display" id="tableone">
                <thead>
                    <tr>
                        <th>Receiver</th>
                        <th>Subject</th>
                        <th>Date Sent</th>
                    </tr>
                </thead>
                <tbody>
               @if($email_histories)
                  @foreach($email_histories as $email_history)
                    <tr>
                        <td>To: {{$email_history->contact->full_name}}</td>
                        <td><a href="{{url('showemail/'.$email_history->template->id)}}" target="_blank">{{$email_history->template->subject}}</a></td>
                        <td>{{date('M d', strtotime($email_history->date_sent))}}</td>
                    </tr>
                    @endforeach
                @endIf
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
                