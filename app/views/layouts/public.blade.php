@include('includes.html-head')

<div id="top-content">
  <div id= "top-bar"></div>
  <div id="logo-bar">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="{{url('/')}}">{{ HTML::image( 'images/logo-2.png', 'logo-image', array( 'class' => 'logo-image' ) ) }}</a>
        </div>
        <div class="col-md-9">
          @include('includes.main-nav')
        </div>
      </div>
    </div>
  </div>
</div>
 
<div id="bottom-content">
  @yield('content')
</div>

@include('includes.footer')