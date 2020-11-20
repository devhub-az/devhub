<header>
    <div class="flex items-center justify-between h-12 xs:h-auto lg:container mx-auto">
        <div class="grid xs:block grid-flow-col xs:text-center xs:w-full gap-3">
            <a class="xs:block text-gray-100 text-2xl font-bold hover:text-gray-200 md:text-2xl m-auto" href="{{ session('main-page') ?? route('home') }}">DevHub</a>
            <ul class="grid grid-flow-col m-auto gap-3 mb:hidden xs:my-2" id="menu">
                <li>
                    <a href="{{ session('main-page') ?? route('home') }}"
                       class="text-sm xs:text-base text-gray-100 hover:text-blue-light transition @if(Request::is('/') || Request::is('post/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) text-blue-light @endif">Paylaşmalar</a>
                </li>
                <li>
                    <a href="{{ route('hubs-list') }}"
                       class="text-sm xs:text-base text-gray-100 hover:text-blue-light transition @if(Request::is('hubs/*') || Request::is('hubs')) text-blue-light @endif">Hablar</a>
                </li>
                <li>
                    <a href="{{ route('users-list') }}"
                       class="text-sm xs:text-base text-gray-100 hover:text-blue-light transition @if(Request::is('users') || Request::is('users/*')) text-blue-light @endif">Müəlliflər</a>
                </li>
                <li>
                    <a href="{{ url('/about_us') }}"
                       class="text-sm xs:text-base text-gray-100 hover:text-blue-light transition @if(Request::is('about_us')) text-blue-light @endif">Məlumat</a>
                </li>
            </ul>
        </div>
{{--        <form id="form_search" action="/search-result" class="form-search" accept-charset="UTF-8" method="POST">--}}
{{--            @csrf--}}
{{--            <div class="header_search">--}}
{{--                <input id="search_input" type="text" class="search" autocomplete="off" name="search" maxlength="48"--}}
{{--                       minlength="3" placeholder="Paylaşma ya hab axtar" required="required">--}}
{{--                <span class="mdi mdi-magnify"></span>--}}
{{--                <span onclick="closeSearch()" class="mdi mdi-file-excel-box"></span>--}}
{{--            </div>--}}
{{--        </form>--}}
        <div class="grid grid-flow-col gap-3 xs:hidden" id="header_app">
            <span id="search-icon" onclick="search()" class="mdi mdi-magnify m-auto text-gray-100"></span>
            @guest
{{--                <switcher-theme></switcher-theme>--}}
                <a href="{{ route('login') }}" class="border border-gray uppercase text-xs rounded px-2 py-1 text-gray-100 bg-transparent">Daxil ol</a>
                <a href="{{ route('register') }}" class="border border-blue uppercase text-xs rounded px-2 py-1 text-gray-200 bg-blue">Qoşulmaq</a>
            @else
                <dropdown-notification :not="{{ Auth::user()->unreadNotifications }}"
                                       :count="'{{ Auth::user()->unreadNotifications->count() }}'"></dropdown-notification>

                {{--                <a href="{{ route('conversations') }}"><span class="mdi mdi-email badge"--}}
                {{--                                                             @if (Auth::user()->messagesNotificationsCount() > 0)--}}
                {{--                                                             data-badge="{{ Auth::user()->messagesNotificationsCount() }}"--}}
                {{--                    @endif/></a>--}}
                <a href="{{ route('create_post') }}" class="btn btn-primary">
                    Yazmaq
                </a>
                <div class="avatar-dropdown">
                    <dropdown :user="{{Auth::user()}}" :fav="'{{route("saved-posts")}}'"
                              {{ Auth::user()->isAn('admin') ? ':admin="' . Auth::user()->isAn('admin') . '"' : null }}></dropdown>
                </div>
            @endguest
        </div>
    </div>
</header>
