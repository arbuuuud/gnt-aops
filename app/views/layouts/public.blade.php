<?php date_default_timezone_set('Asia/Jakarta'); setlocale (LC_TIME, 'INDONESIA'); setlocale (LC_TIME, 'id_ID'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website Resmi Majelis Permusyawaratan Rakyat Republik Indonesia (MPR RI)">
    <meta name="keywords" content="mpr, republik indonesia, Fraksi, Foto, Pimpinan, Anggota, Info Lelang, Katalog Buku, Majalah, Agenda, Berita" />
    <meta name="author" content="Sekretariat Jenderal MPR-RI">
    <meta name="coauthor" content="PT. ASCLAR Indonesia">
    @section('head-meta')@show
    <link rel="icon" href="icon.png">
    <title>@yield('head-title', 'Home') | {{ Sysparam::getValue('web_title') }}</title>
    
    {{ HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') }}
    {{ HTML::style('https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css') }}
    {{ HTML::style('css/jquery-ui.theme.min.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/lightbox.css') }}
    {{ HTML::style('assets/global/plugins/bootstrap-summernote/summernote.css') }}
    {{ HTML::style('css/style.css') }}
    @section('css-style')
    @show

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    {{ HTML::script('js/jquery-ui.min.js') }}
    {{ HTML::script('js/bootstrap.min.js') }}
    {{ HTML::script('js/lightbox.min.js') }}
    {{ HTML::script('assets/global/plugins/bootstrap-summernote/summernote.min.js') }}

    <link href="http://vjs.zencdn.net/4.12/video-js.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/4.12/video.js"></script>
    <style type="text/css">
      .vjs-default-skin .vjs-play-progress,
      .vjs-default-skin .vjs-volume-level { background-color: #ffffff }
      .vjs-default-skin .vjs-control-bar,
      .vjs-default-skin .vjs-big-play-button { background: rgba(0,0,0,0.7) }
      .vjs-default-skin .vjs-slider { background: rgba(0,0,0,0.2333333333333333) }
      .vjs-default-skin .vjs-control-bar { font-size: 60% }
    </style>

    @section('js-script')
    @show
    <script type="text/javascript">
    $( document ).ready(function() {
      var host = "{{ url('/') }}";
      if ( ($(window).height() + 100) < $(document).height() ) {
        $('#top-link-block').removeClass('hidden').affix({
            // how far to scroll down before link "slides" into view
            offset: {top:100}
        });
        $('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
          event.preventDefault(); 
          event.stopPropagation(); 
          $(this).parent().siblings().removeClass('open');
          $(this).parent().toggleClass('open');
        });
      }
      $('.summernote').summernote({
        height: 300,
        onImageUpload: function(files, editor, $editable) {
           sendFile(files[0],editor,$editable);
        }
      });
      $('.carousel').carousel({
        interval: 10000
      });
      $( ".archive-datepicker" ).datepicker({
        dateFormat: 'yy-mm-dd',
        maxDate: '0',
        onSelect: function(date) {
            // alert(date);
            window.location = host + '/kategori/berita/' + date;
        },
        selectWeek: true,
      });
      @if (Sysparam::getValue('homepage_popup_status') == 1)
      $('#homepage-popup-modal').modal('show');
      @endif
      @section('custom-js')
      @show
    });
    </script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-552df7be799b87ee" async="async"></script>
  </head>
<body>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1396320474024755',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div id="top-content">
  <div class="container">
    <div class="row">
      <div id= "top-bar" class="col-md-12" style="position:relative;">
      </div>
      <div id="logo-bar" class="col-md-12">
          {{ HTML::image( 'img/logo.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}
      </div>
    </div>
  </div>
</div>
 
 <div id="bottom-content">
  @yield('content')
</div>

@include('includes.footer')