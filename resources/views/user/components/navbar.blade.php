<nav class="navbar navbar-expand-md bg-transparent mt-0 mt-sm-0 mt-md-4 mt-lg-3 mt-xl-4 sticky-top"
     id="main-menu-nav">
    <div class="collapse navbar-collapse justify-content-center" id="main-menu-navigation">
        <ul class="navbar-nav">
            @foreach($header_tree as $menu)
                @if(!isset($menu['children']))
                    <li class="nav-item">
                        @foreach($menu['translations'] as $tr)
                            @if($tr['locale'] == app()->getLocale())
                                @if($menu['link_type'] == 1)
                                    <a class="nav-link mx-3 text-white"
                                       href="{{ route('pages', $menu['link'] ?? '') }}">{{ $tr['title']}}</a>
                                @else
                                    <a class="nav-link mx-3 text-white"
                                       href="{{ $menu['link'] }}">{{ $tr['title']}}</a>
                                @endif
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
                        <div class="dropdown-menu">
                            @foreach($menu['children'] as $item)
                                @foreach($item['translations'] as $sub_tr)
                                    @if($sub_tr['locale'] == app()->getLocale())
                                        @if($item['link_type'] == 1)
                                            <a class="dropdown-item"
                                               href="{{ route('pages', $item['link'] ?? '') }}">{{ $sub_tr['title']}}</a>
                                        @else
                                            <a class="dropdown-item"
                                               href="{{ $item['link'] }}">{{ $sub_tr['title']}}</a>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</nav>
