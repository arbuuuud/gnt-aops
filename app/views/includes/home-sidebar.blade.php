<!-- MASTER SIDEBAR -->
<div class="panel">
    <div class="panel-heading text-center">
        <h3 class="panel-title text-uppercase">
            Berita Terpopuler&nbsp;&nbsp;&nbsp;
            <a href="{{URL::to('rss/beritaterpopuler')}}"><i class="fa fa-rss"></i></a>
        </h3>
    </div>
    <div class="panel-body">
      @foreach($popular_news as $post)
        <div class="post row">
          <div class="post-media col-md-3 col-xs-3">
            @if($post->image)
            <a href="{{asset($post->image)}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
              {{ HTML::image( $post->image, $post->title, array( 'class' => 'post-object' ) ) }}
            </a>
            @else
              {{ HTML::image( 'img/default-pic.jpg', $post->title, array( 'class' => 'post-object' ) ) }}
            @endif
          </div>
          <div class="post-body col-md-9 col-xs-9">
              <span class="post-date text-grey">{{ $post->translateDate($post->created_at) }}</span>
              <h4 class="post-heading"><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></h4>
              {{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 10) }}
          </div>
        </div>
      @endforeach
    </div>
</div>