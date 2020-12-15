<header class="border-t-4 border-cerulean-500 bg-header sm:px-4 md:px-4" id="header">
    <div class="flex items-center justify-between h-12 xs:h-auto lg:container mx-auto">
        <div class="grid grid-flow-col xs:w-full gap-3 xs:gap-0 xs:flex">
            <div id="mobile-menu__toggler" class="block lg:hidden">
                <button id="mobile-menu__open"
                        class="p-2 items-center justify-center">
                    <i class="iconify text-2xl text-gray-100" data-icon="mdi-menu"></i>
                </button>
                <button id="mobile-menu__close"
                        class="hidden p-2 items-center justify-center">
                    <i class="iconify text-2xl text-gray-100" data-icon="mdi-close"></i>
                </button>
            </div>

            <div class="flex items-center justify-center">
                <a class="pr-2 md:text-2xl items-center xs:ml-0 xs:text-2xl"
                   href="{{ session('main-page') ?? route('home') }}">
                    <img src="{{ asset('images/DevHub_Chrome_Full_Logo.svg') }}" alt="DevHub Logo" width="128"
                         height="36" class="xs:h-8">
                </a>
            </div>
            <ul class="grid grid-flow-col gap-3 md:hidden sm:hidden xs:hidden items-center justify-center" id="menu">
                <li>
                    <a href="{{ session('main-page') ?? route('home') }}"
                       class="font-base xs:text-base  hover:text-cerulean-500 transition {{ (Request::is('/') || Request::is('article/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'text-cerulean-500' : 'text-gray-300' }}">Paylaşmalar</a>
                </li>
                <li>
                    <a href="{{ route('hubs-list') }}"
                       class="font-base xs:text-base hover:text-cerulean-500 transition {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'text-cerulean-500' : 'text-gray-300' }}">Hablar</a>
                </li>
                <li>
                    <a href="{{ route('users-list') }}"
                       class="font-base xs:text-base hover:text-cerulean-500 transition {{ (Request::is('users') || Request::is('users/*')) ? 'text-cerulean-500' : 'text-gray-300' }}">Müəlliflər</a>
                </li>
                <li>
                    <a href="{{ url('/about_us') }}"
                       class="font-base xs:text-base hover:text-cerulean-500 transition {{ (Request::is('about_us')) ? 'text-cerulean-500' : 'text-gray-300' }}">Məlumat</a>
                </li>
            </ul>
        </div>
        {{--        <form id="form_search" action="/search-result" class="form-search" accept-charset="UTF-8" method="POST">--}}
        {{--            @csrf--}}
        {{--            <div class="header_search">--}}
        {{--                <input id="search_input" type="text" class="search" autocomplete="off" name="search" maxlength="48"--}}
        {{--                       minlength="3" placeholder="Paylaşma ya hab axtar" required="required">--}}
        {{--                <span class="iconify" data-icon="mdi-magnify"></span>--}}
        {{--                <span onclick="closeSearch()" class="iconify" data-icon="mdi-file-excel-box"></span>--}}
        {{--            </div>--}}
        {{--        </form>--}}
        <div class="grid xs:flex grid-flow-col gap-3 xs:text-2xl xs:pr-2 text-gray-100">
            <span id="search-icon" onclick="search()" class="iconify m-auto sm:text-2xl cursor-pointer"
                  data-icon="mdi-magnify"></span>
            @guest
                {{--                <switcher-theme></switcher-theme>--}}
                <a href="/login" class="lg:hidden xl:hidden md:hidden sm:block xs:block text-2xl">
                    <i class="iconify" data-icon="mdi-account-outline"></i>
                </a>
                <a href="{{ route('login') }}"
                   class="border border-gray font-normal uppercase text-xs rounded px-2 py-1.5 text-gray-100 bg-transparent xs:hidden sm:hidden">
                    Daxil ol
                </a>
                <a href="{{ route('register') }}"
                   class="border border-cerulean-700 font-normal uppercase text-xs rounded px-2 py-1.5 text-white bg-cerulean-700 hover:bg-cerulean-800 hover:border-cerulean-800 xs:hidden sm:hidden">Qoşulmaq</a>
            @else
                <dropdown-notification :not="{{ Auth::user()->unreadNotifications }}"
                                       :count="'{{ Auth::user()->unreadNotifications->count() }}'" class="xs:hidden"></dropdown-notification>

                {{--                <a href="{{ route('conversations') }}"><span class="iconify" data-icon="mdi-email badge"--}}
                {{--                                                             @if (Auth::user()->messagesNotificationsCount() > 0)--}}
                {{--                                                             data-badge="{{ Auth::user()->messagesNotificationsCount() }}"--}}
                {{--                    @endif/></a>--}}
                <a href="{{ route('create_article') }}"
                   class="border border-cerulean-700 font-semibold uppercase text-xs rounded px-3 py-1.5 text-gray-100 bg-cerulean-700 hover:opacity-90 xs:hidden">
                    Yazmaq
                </a>
                <div class="hidden m-auto lg:block xl:block">
                    <dropdown :user="{{Auth::user()}}" :fav="'{{route("saved-posts")}}'"
                        {{ Auth::user()->isAn('admin') ? ':admin="' . Auth::user()->isAn('admin') . '"' : null }}></dropdown>
                </div>
                <div class="m-auto w-6 h-6 lg:hidden xl:hidden md:hidden" id="mobile-icon__open">
                    <img
                        src="{{ (Auth::user()->avatar !== 'default') ? '/upload/avatars/' . Auth::user()->avatar : config('devhub.default_avatar') }}"
                        alt="User sekili" class="w-6 h-6 rounded ">
                </div>
            @endguest
        </div>
    </div>

    <nav id="mobile-menu__items"
         class="hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="{{ session('main-page') ?? route('home') }}"
               class="{{ (Request::is('/') || Request::is('post/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'bg-gray-900' : '' }}  text-white block px-3 py-2 rounded-md text-base font-medium">Paylaşmalar</a>
            <a href="{{ route('hubs-list') }}"
               class=" {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Hablar</a>
            <a href="{{ route('users-list') }}"
               class="{{ (Request::is('users') || Request::is('users/*')) ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Müəlliflər</a>
            <a href="{{ url('/about_us') }}"
               class="{{ (Request::is('about_us')) ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Məlumat</a>
        </div>
    </nav>


    <nav id="mobile-icon__items"
         class="hidden">
        @auth
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a
                    href="{{ '/users/@' . Auth::user()->username}}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Profilim
                </a>
                <hr class="my-2">
                <a
                    href="{{'/@' . Auth::user()->username . '/settings/profile' }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Parametrlər
                </a>
                <a
                    href="/admin"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Admin panel
                </a>
                <a
                    href="fav"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Seçilmişlər
                </a>
                <hr class="my-2">
                <a
                    href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    Çıxmaq
                </a>
            </div>
        @endauth
    </nav>

</header>

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/header.js') }}" async></script>
    <script>
        function toggleMenu() {
            document.getElementById("mobile-menu__open").classList.toggle("hidden");
            document.getElementById("mobile-menu__close").classList.toggle("hidden");
            document.getElementById("mobile-menu__items").classList.toggle("hidden");
        }

        function toggleIcon() {
            document.getElementById("mobile-icon__items").classList.toggle("hidden");
        }

        window.onload = function () {
            document.getElementById("mobile-menu__open").addEventListener(
                "click",
                () => {
                    document.getElementById("mobile-icon__open").classList.remove("hidden");
                    document.getElementById("mobile-icon__items").classList.add("hidden");
                    toggleMenu();
                },
                false
            );
            document.getElementById("mobile-menu__close").addEventListener(
                "click",
                () => {
                    document.getElementById("mobile-icon__open").classList.remove("hidden");
                    document.getElementById("mobile-icon__items").classList.add("hidden");
                    toggleMenu();
                },
                false
            );
            if (document.getElementById("mobile-icon__open"))
                document.getElementById("mobile-icon__open").addEventListener(
                    "click",
                    () => {
                        document.getElementById("mobile-menu__open").classList.remove("hidden");
                        document.getElementById("mobile-menu__close").classList.add("hidden");
                        document.getElementById("mobile-menu__items").classList.add("hidden");
                        toggleIcon();
                    },
                    false
                );
        }

    </script>
    {{--    <script src="{{ asset('js/stickybits.min.js') }}"></script>--}}
    {{--    <script src="{{asset('js/stickybitsettings.js') }}"></script>--}}
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/header.js') }}" as="script">
@endsection
