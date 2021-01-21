@auth
    @if(auth()->user()->is_admin)
        @include('admin.include.adminbar')
    @endif
@endif
<header class="border-t-4 border-cerulean-700 bg-header dark:bg-gray-800 sm:px-4 md:px-4" id="header">
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
            <ul class="grid grid-flow-col font-medium text-sm gap-3 md:hidden sm:hidden xs:hidden items-center justify-center "
                id="menu">
                <li>
                    <a href="{{ session('main-page') ?? route('home') }}"
                       class=" hover:text-cerulean-500 transition {{ (Request::is('/') || Request::is('article/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'text-cerulean-100' : 'text-gray-100 dark:text-gray-100 dark:hover:text-cerulean-100' }}">Paylaşmalar</a>
                </li>
                <li>
                    <a href="{{ route('hubs-list') }}"
                       class="hover:text-cerulean-500 transition {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'text-cerulean-100' : 'text-gray-100 dark:text-gray-100 dark:hover:text-cerulean-100' }}">Hablar</a>
                </li>
                <li>
                    <a href="{{ route('users-list') }}"
                       class="hover:text-cerulean-500 transition {{ (Request::is('authors') || Request::is('authors/*')) ? 'text-cerulean-100' : 'text-gray-100 dark:text-gray-100 dark:hover:text-cerulean-100' }}">Müəlliflər</a>
                </li>
                <li>
                    <a href="{{ route('about') }}"
                       class="hover:text-cerulean-500 transition {{ (Request::is('about')) ? 'text-cerulean-100' : 'text-gray-100 dark:text-gray-100 dark:hover:text-cerulean-100' }}">Məlumat</a>
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
        <div class="grid xs:flex grid-flow-col space-x-2 text-xl xs:text-2xl xs:pr-2 text-gray-100 items-center">
            <span id="search-icon" onclick="search()" class="iconify m-auto sm:text-2xl cursor-pointer"
                  data-icon="mdi-magnify"></span>
            <span id="toggle" class="cursor-pointer"></span>
            @guest
                {{--                <switcher-theme></switcher-theme>--}}
                <a href="/login" class="lg:hidden xl:hidden md:hidden sm:block xs:block text-2xl">
                    <i class="iconify" data-icon="mdi-account-outline"></i>
                </a>
                <a href="{{ route('login') }}"
                   class="btn-outline text-xs px-4 h-7 xs:hidden sm:hidden hover:border-">
                    Daxil ol
                </a>
                <a href="{{ route('register') }}"
                   class="btn text-xs px-4 h-7 xs:hidden sm:hidden">
                    Qoşulmaq
                </a>
            @else
                <dropdown-notification :notifications="{{ Auth::user()->Notifications }}"
                                       :count="{{ Auth::user()->unreadNotifications->count() }}">
                </dropdown-notification>

                {{--                <a href="{{ route('conversations') }}">--}}
                {{--                    <i class="iconify" data-icon="mdi-email badge"--}}
                {{--                       @if (Auth::user()->messagesNotificationsCount() > 0)--}}
                {{--                       data-badge="{{ Auth::user()->messagesNotificationsCount() }}"--}}
                {{--                        @endif/>--}}
                {{--                </a>--}}
                <a href="{{ route('create_article') }}"
                   class="hover:opacity-90 xs:hidden">
                    <i class="iconify" data-icon="topcoat:pencil"></i>
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
            <a href="{{ route('about') }}"
               class="{{ (Request::is('about')) ? 'bg-gray-900' : '' }} text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Məlumat</a>
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
                    href="{{'/settings' }}"
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
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/header.js') }}" as="script">
@endsection
