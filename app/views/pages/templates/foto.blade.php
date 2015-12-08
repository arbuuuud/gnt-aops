@extends('layouts.public')

@section('css-style')
{{ HTML::style('css/unite-gallery.css') }}
{{ HTML::style('css/ug-theme-default.css') }}
@stop

@section('js-script')
{{ HTML::script('js/ug-common-libraries.js') }}
{{ HTML::script('js/ug-functions.js') }}
{{ HTML::script('js/ug-thumbsgeneral.js') }}
{{ HTML::script('js/ug-thumbsstrip.js') }}
{{ HTML::script('js/ug-touchthumbs.js') }}
{{ HTML::script('js/ug-panelsbase.js') }}
{{ HTML::script('js/ug-strippanel.js') }}
{{ HTML::script('js/ug-gridpanel.js') }}
{{ HTML::script('js/ug-thumbsgrid.js') }}
{{ HTML::script('js/ug-avia.js') }}
{{ HTML::script('js/ug-slider.js') }}
{{ HTML::script('js/ug-sliderassets.js') }}
{{ HTML::script('js/ug-touchslider.js') }}
{{ HTML::script('js/ug-zoomslider.js') }}
{{ HTML::script('js/ug-video.js') }}
{{ HTML::script('js/ug-gallery.js') }}
{{ HTML::script('js/ug-api.js') }}
{{ HTML::script('js/ug-theme-default.js') }}
@stop

@section('custom-js')
$("#gallery").unitegallery(); 
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div id="gallery" style="display:none;">
        {{ HTML::image( 'img/news/F-R-555_416-delegasi-1416362473.jpg', 'MPR', array( 'data-image' => URL::to('/').'/img/gallery/F-R-555_416-zikirnasional-1421033373.jpg', 'data-description' => 'Ketua MPR, Zulkifli Hasan Menghadiri Zikir Nasional di Masjid At-Tin') ) }}
        {{ HTML::image( 'img/news/F-R-555_416-kegpimp-1415781576.jpg', 'MPR', array( 'data-image' => URL::to('/').'/img/news/F-R-555_416-kegpimp-1415781576.jpg', 'data-description' => 'Delegasi') ) }}
      </div>

      <div class="page-header">
        <h3 class="page-title text-uppercase text-brown"><strong>Galeri Foto Terbaru</strong></h3>
      </div>

      <div class="row">
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-delegasi-1416362473.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Delegasi</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-kegpimp-1415782148.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Kegiatan Pimpinan</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-wapres-1413424469.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Wakil Presiden</h4>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-delegasi-1416362473.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Delegasi</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-kegpimp-1415782148.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Kegiatan Pimpinan</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-wapres-1413424469.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Wakil Presiden</h4>
              </div>
            </div>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-delegasi-1416362473.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Delegasi</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-kegpimp-1415782148.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Kegiatan Pimpinan</h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col-md-4">
          <a href="#">
            <div class="thumbnail">
              {{ HTML::image( 'img/news/F-R-555_416-wapres-1413424469.jpg', 'MPR', array( 'data-description' => 'Lorem Ipsum', 'class' => 'img-responsive') ) }}
              <div class="caption">
                <div class="post-date">{{date('l, F j Y H:i')}}</div>
                <h4>Wakil Presiden</h4>
              </div>
            </div>
          </a>
        </div>
      </div>

      <nav class="text-center">
        <ul class="pagination">
          <li>
            <a href="#" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li>
            <a href="#" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>

    </div>
  </div>
</div>


@stop