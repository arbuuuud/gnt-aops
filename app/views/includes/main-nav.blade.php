<nav class="navbar navbar-default navbar-fixed-top" id="topfixedmenu">
  <div class="container">
     <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-top-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
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
      <ul class="nav navbar-nav navbar-right">
        @foreach (Menu::find('2')->items()->parent()->visible()->get() as $item)
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
    </div><!-- /.navbar-collapse -->
    <div class="bg-red" style="height:5px"></div>
  </div>
</nav>