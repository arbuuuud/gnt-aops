@extends('layouts.'.Auth::user()->roleString())

@section('content')

<div class="row">
    <div class="col-md-12">
        <h3 class="page-title">
            Daftar Semua Contact
            <!-- <a href="{{route(Auth::user()->roleString().'.contacts.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Registrasi Contact</a> -->
        </h3>
        @if (Session::get('message'))
        <div class="alert alert-success">
            <strong><i class="fa fa-check"></i> {{Session::get('message')}}</strong>
        </div>
        @endif

<div id="styled-select">
</div>
        <div class="table-responsive">
            <table class="table mpr_datatable display" id="tableone">
                <tbody>
                @if($email_histories)
                
                  @foreach($email_histories as $email_history)
                        
                    <tr>
                        <td class="text-left">{{$email_history->template->subject}}</td>
                        <td class="text-left">{{date('d F, Y', strtotime($email_history->date_sent))}}</td>
                    </tr>
                    @endforeach
                @endIf
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop