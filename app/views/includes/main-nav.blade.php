<!--nav class="navbar navbar-default" id="topfixedmenu">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-top-menu">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="collapse navbar-collapse" id="main-top-menu">
    <ul class="nav navbar-nav">
      @foreach (Menu::find('1')->items()->parent()->visible()->get() as $item)
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
    </ul>
  </div>
</nav-->
<div id="nav-menu-white" class="col-sm-1 col-xs-1 col-xs-offset-4">
            <div class="menu-text">
                Menu
            </div>
            <div class="menu-icon-white">
            </div>
</div>
<div id="menu-popup">
    <ul id="menu-popup-items">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/kategori/uncategorized')}}">Article</a></li>
    </ul>
    <div id="menu-popup-close">
        X
    </div>
</div>
