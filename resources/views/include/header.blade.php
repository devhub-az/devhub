@can(App\Policies\AuthorPolicy::ADMIN, App\Models\User::class)
    @include('admin.include.adminbar')
@endcan
<header class="bg-white dark:bg-gray-800 sm:px-4 md:px-4 xs:px-4" id="header">
    <div class="flex items-center justify-between h-12 lg:container mx-auto">
        <div class="grid grid-flow-col xs:w-max gap-3 xs:gap-0 xs:flex">
            <div id="mobile-menu__toggler" class="block lg:hidden">
                <button id="mobile-menu__open"
                        class="items-center pr-2 my-auto block h-full justify-center">
                    <i class="iconify text-2xl text-gray-600 dark:text-gray-300" data-icon="mdi-menu"></i>
                </button>
                <button id="mobile-menu__close"
                        class="hidden pr-2 items-center my-auto block h-full justify-center">
                    <i class="iconify text-2xl text-gray-600 dark:text-gray-300" data-icon="mdi-close"></i>
                </button>
            </div>

            <div id="logo" class="flex items-center justify-center">
                <a class="pr-2 md:text-2xl items-center xs:ml-0 xs:text-2xl"
                   href="{{ session('main-page') ?? route('home') }}">
                    <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="128"
                         height="2.25rem" class="xs:h-9 dark:hidden">
                    <img src="{{ asset('images/DevHub_Chrome_Full_Logo.svg') }}" alt="DevHub Logo" width="128"
                         height="2.25rem" class="xs:h-9 hidden dark:block">
                </a>
            </div>
            <ul class="grid relative grid-flow-col font-medium text-sm gap-3 md:hidden sm:hidden xs:hidden items-center justify-center"
                id="menu">
                <li>
                    <a id="trans-none" href="{{ session('main-page') ?? route('home') }}"
                       class="hover:border-b-2 hover:border-cerulean-100 pb-2 font-semibold {{ (Request::is('/') || Request::is('article/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{__('devhub.articles')}}</a>
                </li>
                <li>
                    <a id="trans-none" href="{{ route('hubs-list') }}"
                       class="hover:border-b-2 hover:border-cerulean-100 pb-2 font-semibold {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{__('devhub.hubs')}}</a>
                </li>
                <li>
                    <a id="trans-none" href="{{ route('users-list') }}"
                       class="hover:border-b-2 hover:border-cerulean-100 pb-2 font-semibold {{ (Request::is('authors') || Request::is('authors/*') || Request::is('@*')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{ __('devhub.authors') }}</a>
                </li>
                <li>
                    <a id="trans-none" href="{{ route('about') }}"
                       class="hover:border-b-2 hover:border-cerulean-100 pb-2 font-semibold {{ (Request::is('about')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{ __('devhub.about') }}</a>
                </li>
            </ul>
        </div>
{{--        <div class="fixed w-full h-screen top-0 bottom-0 left-0 z-40 bg-gray-700 bg-opacity-40">--}}
{{--            <div class="absolute w-8/12 left-1/2 transform -translate-x-1/2 -translate-y-1/2" style="top:15%">--}}
{{--                <span--}}
{{--                    class="absolute text-gray-500 top-3.5 text-xl left-4 iconify mr-2 text-base transform -translate-y-1/2"--}}
{{--                    data-icon="fluent:search-24-regular" data-inline="false"></span>--}}
{{--                <input type="text"--}}
{{--                       class="input w-full rounded-t focus:outline-none focus:ring-0 hover:border-none border-none px-12 h-12">--}}
{{--            </div>--}}
{{--        </div>--}}
        <form id="form_search" action="/search-result" class="flex-1 absolute relative w-full items-center hidden"
              accept-charset="UTF-8" method="POST">
            @csrf
            <div class="w-full">
                <input id="search_input" type="text"
                       class="relative input w-full rounded h-8 border pl-8"
                       autocomplete="off"
                       name="search"
                       maxlength="48"
                       minlength="3" placeholder="{{ __('devhub.searchAll') }}" required="required">
                <span class="iconify text-xl absolute left-2 translate-y-1/2 top-0 my-1.5 mr-4 dark:text-gray-300"
                      data-icon="mdi-magnify"></span>
                <span id="close-icon"
                      class="iconify cursor-pointer text-xl absolute right-2 translate-y-1/2 top-0 my-1.5 dark:text-gray-300"
                      data-icon="bx:bx-x-circle"></span>
            </div>
        </form>
        <div class="flex xs:flex space-x-4 text-xl xs:text-2xl items-center">
{{--            <button id="s"--}}
{{--                    class="flex items-center bg-gray-50 border rounded text-sm leading-3 px-2 py-1 text-gray-600 border-gray-300 focus:outline-none">--}}
{{--                <span class="iconify mr-2 text-base" data-icon="fluent:search-24-regular" data-inline="false"></span>--}}
{{--                Search Community--}}
{{--            </button>--}}
            <span id="search-icon" class="iconify m-auto text-gray-600 xs:text-2xl cursor-pointer dark:text-gray-300 transition-none"
                  data-icon="mdi-magnify"></span>
            @guest
                <a href="/login"
                   class="lg:hidden xl:hidden md:hidden sm:block xs:block text-2xl text-gray-700 dark:text-gray-100 dark:hover:text-cerulean-100">
                    <i class="iconify" data-icon="mdi-account-outline"></i>
                </a>
                <div class="flex items-center space-x-2 xs:hidden sm:hidden">
                    <a href="{{ route('login') }}" id="trans-none"
                       class="btn-outline text-xs px-4 h-7">
                        {{ __('devhub.login') }}
                    </a>
                    <a href="{{ route('register') }}" id="trans-none"
                       class="btn text-xs px-4 h-7">
                        {{ __('devhub.connect') }}
                    </a>
                </div>
            @else
                <dropdown-notification :notifications="{{ Auth::user()->Notifications }}"
                                       :count="{{ Auth::user()->unreadNotifications->count() }}">
                </dropdown-notification>
                <a href="{{ route('article.create') }}"
                   class="btn h-6 w-6 p-0 xs:hidden">
                    <span class="iconify mx-auto text-xl text-white dark:text-white" data-icon="bi:plus" data-inline="false"></span>
                </a>
                <div class="hidden m-auto lg:block xl:block">
                    <dropdown :user="{{Auth::user()}}"
                              :avatar_url="'{{ Auth::user()->getMedia('avatars')->first()->getFullUrl() }}'"
                              :fav="'{{route("saved-articles")}}'"></dropdown>
                </div>
                <div class="m-auto lg:hidden xl:hidden md:hidden" id="mobile-icon__open">
                    <img
                        src="{{ (Auth::user()->avatar !== 'default') ? Auth::user()->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}"
                        alt="{{ __('devhub.authorLogo') }}" class="w-6 h-6 rounded xs:w-8 xs:h-8">
                </div>
            @endguest
        </div>
    </div>

    <nav id="mobile-menu__items"
         class="hidden lg:hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ session('main-page') ?? route('home') }}"
               class="{{ (Request::is('/') || Request::is('post/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'text-white bg-cerulean-500' : 'text-gray-700 dark:text-gray-300' }} hover:text-white hover:bg-gray-700 block px-3 py-2 rounded-md text-base font-medium">{{ __('devhub.articles') }}</a>
            <a href="{{ route('hubs-list') }}"
               class=" {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'text-white bg-cerulean-500' : 'text-gray-700 dark:text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ __('devhub.hubs') }}</a>
            <a href="{{ route('users-list') }}"
               class="{{ (Request::is('users') || Request::is('users/*')) ? 'text-white bg-cerulean-500' : 'text-gray-700 dark:text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ __('devhub.authors') }}</a>
            <a href="{{ route('about') }}"
               class="{{ (Request::is('about')) ? 'text-white bg-cerulean-500' : 'text-gray-700 dark:text-gray-300' }} hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">{{ __('devhub.about') }}</a>
        </div>
    </nav>

    <nav id="mobile-icon__items"
         class="hidden lg:hidden md:hidden">
        @auth
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a
                    href="{{ '/users/@' . Auth::user()->username}}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('devhub.profile') }}
                </a>
                <hr class="my-2">
                <a
                    href="{{'/settings' }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('devhub.settings') }}
                </a>
                <a
                    href="{{ url('/fav') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('.devhub.favorites') }}
                </a>
                <hr class="my-2">
                <a
                    href="{{ route('logout') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">
                    {{ __('devhub.exit') }}
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
