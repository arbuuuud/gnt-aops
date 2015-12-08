@extends('layouts.public')

@section('head-title')
Home
@stop

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8" id="main-content">
        @foreach($latest_news as $post)
          <div class="post row">
            <div class="post-media col-md-3">
                @if($post->image)
                <a href="{{$post->image}}" data-lightbox="image-{{$post->slug}}" data-title="{{$post->title}}">
                  {{ HTML::image( $post->image, $post->title, array( 'class' => 'post-object' ) ) }}
                </a>
                @else
                  {{ HTML::image( 'img/default-pic.jpg', $post->title, array( 'class' => 'post-object' ) ) }}
                @endif
            </div>
            <div class="post-body col-md-9">
                <span class="post-date">{{ $post->translateDate($post->created_at) }}</span>
                <div class="addthis_toolbox addthis_default_style" addthis:title="{{$post->title}}" addthis:description="{{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}" addthis:url="{{URL::to('posts/'.$post->slug)}}" style="display:inline-block;margin-left:10px;">
                  <a class="addthis_button_compact"></a>
                  <a class="addthis_counter addthis_bubble_style"></a>
                </div>
                <h4 class="post-heading"><a href="{{URL::to('posts/'.$post->slug)}}">{{$post->title}}</a></h4>
                {{ ( $post->excerpt != NULL) ? $post->excerpt : str_limit(strip_tags($post->content), 300) }}
            </div>
          </div>
        @endforeach
        
        {{-- pagination --}}
        <div class="text-center">
          {{ $latest_news->links() }}
        </div>

        <div class="text-right">
            <h5><a href="{{URL::to('kategori/uncategorized')}}" class="text-brown">Lihat Semua &raquo;</a></h5>
        </div>

        @if (Sysparam::getValue('homepage_popup_status') == 1)
        <!-- Modal -->
        <div class="modal fade" id="homepage-popup-modal">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <a href="{{ Sysparam::getValue('homepage_popup_link') }}">
                  {{ HTML::image( Sysparam::getValue('homepage_slider'), '', array( 'width' => '100%' ) ) }}
                </a>
              </div>
            </div>
          </div>
        </div>
        @endif

    </div>
    <div class="col-md-4" id="sidebar">
      @include('includes.home-sidebar')
    </div>
  </div>
</div>
@stop