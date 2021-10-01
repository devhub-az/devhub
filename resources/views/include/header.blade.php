@can(App\Policies\AuthorPolicy::ADMIN, App\Models\User::class)
    @include('admin.include.adminbar')
@endcan
<header class="bg-white dark:bg-gray-800 sm:px-4 md:px-4 xs:px-4 trans-none" id="header">
    <div class="flex items-center justify-between h-12 lg:container mx-auto">
        <div class="flex items-center xs:space-x-0">
            <div id="mobile-menu__toggler" class="lg:hidden xl:hidden">
                <button id="mobile-menu__open"
                        class="items-center pr-2 my-auto block h-full justify-center">
                    <i class="iconify text-2xl text-gray-600 dark:text-gray-300" data-icon="mdi-menu"></i>
                </button>
                <button id="mobile-menu__close"
                        class="hidden pr-2 items-center my-auto block h-full justify-center">
                    <i class="iconify text-2xl text-gray-600 dark:text-gray-300" data-icon="mdi-close"></i>
                </button>
            </div>
            <div class="flex xs:w-max space-x-3 xs:space-x-0 xs:flex items-center">
                <div id="logo" class="flex items-center justify-center">
                    <a href="{{ session('main-page') ?? route('home') }}" class="flex items-center space-x-2">
                        <img src="{{ asset('images/DevHub_Chrome_Full_Logo.svg') }}" alt="DevHub Logo"
                             class="h-8 xs:h-9 hidden dark:block">
                        <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo"
                             class="h-8 xs:h-9 dark:hidden">
                    </a>
                </div>

                <ul class="grid relative grid-flow-col font-medium text-sm space-x-3 md:hidden sm:hidden xs:hidden items-center justify-center"
                    id="menu">
                    <li>
                        <a href="{{ session('main-page') ?? route('home') }}"
                           class="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold {{ (Request::is('/') || Request::is('article/*') || Request::is('all') || Request::is('top/*') || Request::is('favorite')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{__('devhub.articles')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('hubs-list') }}"
                           class="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold {{ (Request::is('hubs/*') || Request::is('hubs')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{__('devhub.hubs')}}</a>
                    </li>
                    <li>
                        <a href="{{ route('users-list') }}"
                           class="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold {{ (Request::is('authors') || Request::is('authors/*') || Request::is('@*')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{ __('devhub.authors') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}"
                           class="hover:border-b-2 trans-none hover:border-cerulean-100 pb-1 font-semibold {{ (Request::is('about')) ? 'dark:text-white border-b-2 border-cerulean-100' : 'text-gray-500 hover:text-black dark:text-gray-300' }}">{{ __('devhub.about') }}</a>
                    </li>
                </ul>
            </div>
        </div>
        <form id="form_search" action="{{ route('search.articles') }}"
              class="flex-1 absolute relative w-full items-center hidden"
              accept-charset="UTF-8" method="GET">
            @csrf
            <div class="w-full ml-2">
                <input id="search_input" type="text"
                       class="relative input w-full rounded h-7 border pl-8"
                       autocomplete="off"
                       name="search"
                       maxlength="48"
                       minlength="3" placeholder="{{ __('devhub.searchAll') }}" required="required">
                <span
                    class="iconify text-gray-600 text-lg absolute left-4 translate-y-1/2 top-0 my-1 mr-4 dark:text-gray-300"
                    data-icon="tabler:search"></span>
                <span id="close-icon"
                      class="iconify text-gray-600 cursor-pointer text-lg absolute right-0 translate-y-1/2 top-0 my-1 dark:text-gray-300"
                      data-icon="tabler:x"></span>
            </div>
        </form>
        <div class="flex xs:flex space-x-4 text-xl xs:text-2xl items-center">
            <span id="search-icon"
                  class="iconify text-lg m-auto text-gray-600 xs:text-2xl cursor-pointer dark:text-gray-300 transition-none"
                  data-icon="tabler:search"></span>
            @guest
                <a href="/login"
                   class="lg:hidden xl:hidden md:hidden sm:block xs:block text-2xl text-gray-700 dark:text-gray-100 dark:hover:text-cerulean-100">
                    <i class="iconify" data-icon="mdi-account-outline"></i>
                </a>
                <div class="flex items-center space-x-2 xs:hidden sm:hidden">
                    <a href="{{ route('login') }}"
                       class="btn-outline text-xs px-4 h-7">
                        {{ __('devhub.login') }}
                    </a>
                    <a href="{{ route('register') }}"
                       class="btn text-xs px-4 h-7">
                        {{ __('devhub.register') }}
                    </a>
                </div>
            @else
                <dropdown-notification :notifications="{{ Auth::user()->Notifications }}"
                                       :count="{{ Auth::user()->unreadNotifications->count() }}">
                </dropdown-notification>
                <a href="{{ route('article.create') }}"
                   class="btn h-7 xs:hidden">
                    {{ __('devhub.write') }}
                </a>
                <div class="hidden m-auto lg:block xl:block">
                    <dropdown :user="{{Auth::user()}}"
                              :avatar_url="'{{ (Auth::user()->avatar !== 'default') ? Auth::user()->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}'"
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

    <nav id="mobile-icon__items" class="hidden lg:hidden md:hidden">
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
    <script type="text/javascript" src="{{ mix('js/header.js') }}" defer></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/header.js') }}" as="script">
@endsection
