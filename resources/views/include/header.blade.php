<header class="layout__navbar">
    <div class="main-navbar">
        <div class="main-navbar__section main-navbar__section_left">
            <a class="logo" href="{{ session('main-page') ?? route('home') }}">DevHub <i class="icon devhub icon-beta-line"></i></a>
            <ul class="nav-links" id="navbar-links">
                <li class="nav-links__item">
                    <a href="{{ session('main-page') ?? route('home') }}"
                       class="nav-links__item-link @if(Request::is('/') || Request::is('post/*') || Request::is('all') || Request::is('top/*')) nav-links__item-link_current @endif">Paylaşmalar</a>
                </li>
                <li class="nav-links__item">
                    <a href="{{ url('hubs') }}"
                       class="nav-links__item-link @if(Request::is('hubs/*') || Request::is('hubs')) nav-links__item-link_current @endif">Hablar</a>
                </li>
                <li class="nav-links__item">
                    <a href="{{ route('users-list') }}"
                       class="nav-links__item-link @if(Request::is('users') || Request::is('users/*')) nav-links__item-link_current @endif">Müəlliflər</a>
                </li>
                <li class="nav-links__item">
                    <a href="{{ url('/about_us') }}"
                       class="nav-links__item-link @if(Request::is('about_us')) nav-links__item-link_current @endif">Haqqımızda</a>
                </li>
            </ul>
        </div>
        <form id="form_search" action="/search-result" class="form-search" accept-charset="UTF-8" method="POST">
            @csrf
            <div class="header_search">
                <input id="search_input" type="text" class="search" autocomplete="off" name="search" maxlength="48"
                       minlength="3" placeholder="Paylasma ya hub axtar" required="required">
                <i class="icon feather icon-search"></i>
                <i onclick="closeSearch()" class="icon feather icon-x"></i>
            </div>
        </form>
        <div class="main-navbar__section main-navbar__section_right" id="header_app"
             style="display: grid;grid-auto-flow: column; grid-gap: 12px;">
            <i id="search-icon" onclick="search()" class="icon feather icon-search"></i>
            @guest
                <a href="{{ route('login') }}" class="btn btn-primary btn_navbar_login">Daxil ol</a>
                <a href="{{ route('register') }}" class="btn btn_navbar_registration">Qeydiyyatdan Keç</a>
            @else

                <dropdown-notification :not="{{ Auth::user()->unreadNotifications }}" :count="'{{ Auth::user()->unreadNotifications->count() }}'"></dropdown-notification>

                <a href="{{ route('conversations') }}"><i class="icon feather icon-mail badge"
                                                          @if (Auth::user()->messagesNotificationsCount() > 0)
                                                          data-badge="{{ Auth::user()->messagesNotificationsCount() }}"
                            @endif></i></a>
                <a href="{{ route('create_post') }}" class="btn btn-primary button_add">
                    Yazmaq
                </a>
                <div class="avatar-dropdown">
                    <dropdown :user="{{Auth::User()}}"></dropdown>
                </div>
            @endguest
        </div>
    </div>
</header>
<form id="logout-form" action="{{ route('logout') }}" method="POST" {{-- style="display: none;" --}}>
    @csrf
</form>
