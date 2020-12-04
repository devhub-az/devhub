<header class="border-t-4 border-blue bg-header sm:px-4 md:px-4" id="header">
    <div class="flex items-center justify-between h-12 lg:container mx-auto">
        <div class="grid xs:block grid-flow-col xs:w-full gap-3">
            <a class="text-gray-100 text-2xl border-r border-gray-300 pr-2 xs:border-none font-bold hover:text-gray-200 md:text-2xl m-auto xs:pl-4 xs:text-2xl"
               href="{{ session('main-page') ?? route('home') }}">DevHub</a>
            <ul class="grid grid-flow-col m-auto gap-3 mb:hidden  xs:hidden" id="menu">
                <li>
                    <a href="{{ session('main-page') ?? route('home') }}"
                       class="text-sm xs:text-base  hover:text-blue-light transition {{ (Request::is('/') || Request::is('post/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'text-blue-light' : 'text-gray-100' }}">Paylaşmalar</a>
                </li>
                <li>
                    <a href="{{ route('hubs-list') }}"
                       class="text-sm xs:text-base hover:text-blue-light transition {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'text-blue-light' : 'text-gray-100' }}">Hablar</a>
                </li>
                <li>
                    <a href="{{ route('users-list') }}"
                       class="text-sm xs:text-base hover:text-blue-light transition {{ (Request::is('users') || Request::is('users/*')) ? 'text-blue-light' : 'text-gray-100' }}">Müəlliflər</a>
                </li>
                <li>
                    <a href="{{ url('/about_us') }}"
                       class="text-sm xs:text-base hover:text-blue-light transition {{ (Request::is('about_us')) ? 'text-blue-light' : 'text-gray-100' }}">Məlumat</a>
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
        <div class="grid grid-flow-col gap-3 xs:text-2xl xs:pr-2 text-gray-100">
            <span id="search-icon" onclick="search()" class="mdi mdi-magnify m-auto"></span>
            @guest
                {{--                <switcher-theme></switcher-theme>--}}
                <a href="/login" class="xs:block md:hidden lg:hidden sm:hidden"><i class="mdi mdi-account-outline"></i></a>
                <a href="{{ route('login') }}"
                   class="border border-gray uppercase text-xs rounded px-2 py-1 text-gray-100 bg-transparent xs:hidden">
                    Daxil ol
                </a>
                <a href="{{ route('register') }}"
                   class="border border-blue uppercase text-xs rounded px-2 py-1 text-gray-200 bg-blue xs:hidden">Qoşulmaq</a>
            @else
                <dropdown-notification :not="{{ Auth::user()->unreadNotifications }}"
                                       :count="'{{ Auth::user()->unreadNotifications->count() }}'"></dropdown-notification>

                {{--                <a href="{{ route('conversations') }}"><span class="mdi mdi-email badge"--}}
                {{--                                                             @if (Auth::user()->messagesNotificationsCount() > 0)--}}
                {{--                                                             data-badge="{{ Auth::user()->messagesNotificationsCount() }}"--}}
                {{--                    @endif/></a>--}}
                <a href="{{ route('create_post') }}"
                   class="border border-blue font-semibold uppercase text-xs rounded px-3 py-1.5 text-gray-100 bg-blue hover:opacity-90">
                    Yazmaq
                </a>
                <div class="m-auto">
                    <dropdown :user="{{Auth::user()}}" :fav="'{{route("saved-posts")}}'"
                        {{ Auth::user()->isAn('admin') ? ':admin="' . Auth::user()->isAn('admin') . '"' : null }}></dropdown>
                </div>
            @endguest
        </div>
    </div>
</header>

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/header.js') }}"></script>
    {{--    <script src="{{ asset('js/stickybits.min.js') }}"></script>--}}
    {{--    <script src="{{asset('js/stickybitsettings.js') }}"></script>--}}
@endsection

@section('styles')
    <link rel="preload" href="{{ mix('js/header.js') }}" as="script">
@endsection
