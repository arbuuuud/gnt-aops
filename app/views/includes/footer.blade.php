    <div id="footer">
        <div class="container">
            <div class="well well-lg">
                <div class="row">
                    <div class="col-md-6 text-right pull-right">
                        <ul class="list-inline">
                            <li><a href="{{Sysparam::getValue('facebook_link')}}" target="_blank" title="Kunjungi Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                            <li><a href="{{Sysparam::getValue('twitter_link')}}" target="_blank" title="Kunjungi Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                            <li><a href="mailto:{{Sysparam::getValue('contact_email')}}" title="Email MPR"><i class="fa fa-envelope fa-2x"></i></a></li>
                            <li><a href="{{URL::to('rss')}}"><i class="fa fa-rss-square fa-2x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="text-uppercase">{{Menu::find('3')->name}}</h4>
                                @foreach (Menu::find('3')->items()->parent()->visible()->get() as $item)
                                  <?php
                                    $menulinks = array();
                                    $menulinks[] = $item->link;
                                    foreach ($item->childs as $itemchild) {
                                      $menulinks[] = $itemchild->link;
                                    }
                                  ?>
                                  @if(count($item->childs()->visible()->get()))
                                    <li class="@if(in_array(Request::path(), $menulinks)) active @endif dropdown">
                                      <a href="{{ URL::to($item->link) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{$item->name}} <span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-1st" role="menu">
                                      @foreach($item->childs()->visible()->get() as $itemchild)
                                        <li class="@if( Request::path() == $itemchild->link ) active @endif">
                                          <a href="{{ URL::to($itemchild->link) }}">{{$itemchild->name}}</a>
                                        </li>
                                      @endforeach
                                      </ul>
                                    </li>
                                  @else
                                    <li class="@if(Request::path() == $item->link) active @endif">
                                      <a href="{{ URL::to($item->link) }}">{{$item->name}}</a>
                                    </li>
                                  @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">{{Menu::find('4')->name}}</h4>
                                @foreach (Menu::find('3')->items()->parent()->visible()->get() as $item)
                                  <?php
                                    $menulinks = array();
                                    $menulinks[] = $item->link;
                                    foreach ($item->childs as $itemchild) {
                                      $menulinks[] = $itemchild->link;
                                    }
                                  ?>
                                  @if(count($item->childs()->visible()->get()))
                                    <li class="@if(in_array(Request::path(), $menulinks)) active @endif dropdown">
                                      <a href="{{ URL::to($item->link) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{$item->name}} <span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-1st" role="menu">
                                      @foreach($item->childs()->visible()->get() as $itemchild)
                                        <li class="@if( Request::path() == $itemchild->link ) active @endif">
                                          <a href="{{ URL::to($itemchild->link) }}">{{$itemchild->name}}</a>
                                        </li>
                                      @endforeach
                                      </ul>
                                    </li>
                                  @else
                                    <li class="@if(Request::path() == $item->link) active @endif">
                                      <a href="{{ URL::to($item->link) }}">{{$item->name}}</a>
                                    </li>
                                  @endif
                                @endforeach
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-uppercase">{{Menu::find('5')->name}}</h4>
                                @foreach (Menu::find('3')->items()->parent()->visible()->get() as $item)
                                  <?php
                                    $menulinks = array();
                                    $menulinks[] = $item->link;
                                    foreach ($item->childs as $itemchild) {
                                      $menulinks[] = $itemchild->link;
                                    }
                                  ?>
                                  @if(count($item->childs()->visible()->get()))
                                    <li class="@if(in_array(Request::path(), $menulinks)) active @endif dropdown">
                                      <a href="{{ URL::to($item->link) }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                        {{$item->name}} <span class="caret"></span>
                                      </a>
                                      <ul class="dropdown-menu dropdown-menu-1st" role="menu">
                                      @foreach($item->childs()->visible()->get() as $itemchild)
                                        <li class="@if( Request::path() == $itemchild->link ) active @endif">
                                          <a href="{{ URL::to($itemchild->link) }}">{{$itemchild->name}}</a>
                                        </li>
                                      @endforeach
                                      </ul>
                                    </li>
                                  @else
                                    <li class="@if(Request::path() == $item->link) active @endif">
                                      <a href="{{ URL::to($item->link) }}">{{$item->name}}</a>
                                    </li>
                                  @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        {{Sysparam::getValue('footer_address')}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <span id="top-link-block" class="hidden">
        <a href="#top" class="btn bg-red text-white" onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
            <i class="glyphicon glyphicon-chevron-up"></i>
        </a>
    </span><!-- /top-link-block -->

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p><small>{{Sysparam::getValue('footer_copyright')}}</small></p>
            </div>
        </div>
    </div>

<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES * * */
    var disqus_shortname = 'mprgoid';
    
    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = '//' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
</script>
</body>
</html>