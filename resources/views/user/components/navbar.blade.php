<nav class="navbar navbar-expand-md bg-transparent mt-0 mt-sm-0 mt-md-4 mt-lg-3 mt-xl-4 sticky-top"
     id="main-menu-nav">
    <div class="collapse navbar-collapse justify-content-center" id="main-menu-navigation">
        <ul class="navbar-nav">
            @foreach($header_tree as $menu)
                @if(!isset($menu['children']))
                    <li class="nav-item">
                        @foreach($menu['translations'] as $tr)
                            @if($tr['locale'] == app()->getLocale())
                                <a class="nav-link mx-3 text-white"
                                   href="#">
                                    <span>{{ $tr['title'] }}</span>
                                </a>
                            @endif
                        @endforeach
                    </li>
                @endif
                @if(isset($menu['children']))
                    <li class="nav-item dropdown">
                        @foreach($menu['translations'] as $tr)
                            @if($tr['locale'] == app()->getLocale())
                                <a class="nav-link dropdown-toggle mx-3 text-white" href="#"
                                   data-toggle="dropdown">
                                    {{ $tr['title'] }}
                                </a>
                            @endif
                        @endforeach
                        @foreach($menu['children'] as $item)
                            <div class="dropdown-menu">
                                @foreach($item['translations'] as $sub_tr)
                                    @if($sub_tr['locale'] == app()->getLocale())
                                        <a class="dropdown-item" href="#">{{ $sub_tr['title']}}</a>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
