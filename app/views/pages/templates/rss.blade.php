@extends('layouts.public')

@section('head-title')
RSS Feed
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="page-header">
          <h3 class="page-title text-center text-uppercase text-brown"> <strong><i class="fa fa-rss"></i> RSS Feed</strong></h3>
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Judul</th>
                <th>Link</th>
              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <td>{{$category->title}}</td>
                <td>
                  <a href="{{URL::to('rss/artikel/'.$category->slug)}}" title="RSS Feed {{$category->title}}">
                    {{URL::to('rss/artikel/'.$category->slug)}}
                  </a>
                </td>
              </tr>
              @endforeach
              <tr>
                <td>
                  Berita Terkini
                </td>
                <td>
                  <a href="{{URL::to('rss/beritaterkini')}}" title="RSS Feed Berita Terkini">
                    {{URL::to('rss/beritaterkini')}}
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  Berita Terpopuler
                </td>
                <td>
                  <a href="{{URL::to('rss/beritaterpopuler')}}" title="RSS Feed Berita Terpopuler">
                    {{URL::to('rss/beritaterpopuler')}}
                  </a>
                </td>
              </tr>
              <tr>
                <td>
                  Surat Pembaca
                </td>
                <td>
                  <a href="{{URL::to('rss/suratpembaca')}}" title="RSS Feed Surat Pembaca">
                    {{URL::to('rss/suratpembaca')}}
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        
    </div>
  </div>
</div>
@stop