<div id="footer">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <p>Copyright &copy; 2016 - All Right Reserved
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
                    | <a href="{{ URL::to($item->link) }}">{{$item->name}}</a>
                    </li>
                  @endif
                @endforeach
              <p>Supported by <a href="http://gnt-indonesia.com" title="Visit Website PT. GNT" target="_blank">PT Guna Natur Tulen</a></p>
          </div>
        </div>
    </div>
</div>
</body>
</html>