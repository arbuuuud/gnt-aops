@extends('layouts.public')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="row page-header">
        <div class="col-md-5">  
          <img src="holder.js/100%x400">
        </div>
        <div class="col-md-7">  
          <h3 class="media-heading" style="font-size: 2.5em; font-weight: 800;">Budaya Masjid Makin Luntur</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In sit amet ligula turpis. Vivamus pellentesque turpis elementum tortor placerat eleifend. Sed eget massa aliquam magna ullamcorper accumsan. Vivamus cursus nec mauris sit amet porttitor. Sed et tincidunt sapien, varius scelerisque sapien. Curabitur hendrerit arcu eget pretium maximus. Nunc semper, ligula in euismod mattis, lacus augue suscipit justo, eget congue enim orci nec odio. Morbi ultricies, mi id ultrices tempus, nunc augue elementum massa, nec consectetur massa risus nec lorem. In imperdiet efficitur ipsum, ut placerat tortor aliquet at. Nunc vel venenatis justo. Nunc sollicitudin ultrices consequat.</p>
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