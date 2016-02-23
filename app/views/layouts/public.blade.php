@include('includes.html-head')

<div id="bottom-content">
  @yield('content')
</div>

<script type="text/javascript">
  $('#nav-menu').click(function() {
    $('#menu-popup').css({'height':'100%','-webkit-transition':'1s'})
  });

  $('#menu-popup-close').click(function(){
    $('#menu-popup').css({'height':'0%','-webkit-transition':'1s'})
  });
</script>

@include('includes.footer')