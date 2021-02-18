<footer class="text-gray-300 body-font bg-footer py-2 mt-auto">
    <div class="flex justify-between xs:block items-center xs:h-auto lg:container mx-auto">
        <div class="flex xs:block items-center">
            <a href="{{ route('home') }}"
               class="flex title-font font-medium items-center md:justify-start justify-center text-gray-100 xs:pb-4">
                <img src="{{ asset('images/DevHub_Compact_Logo.svg') }}" alt="DevHub Logo" width="40" height="40"
                     class="xs:h-8">
            </a>
            <p class="text-sm text-gray-100 pl-4 py-2 my-auto xs:p-0 xs:text-center">
                &copy; 2019 – {{ date('Y') }} <span class="lg:hidden md:hidden xl:hidden">«DevHub»</span>
            </p>
            <ul class="flex xs:hidden my-auto ml-4 flex-wrap uppercase text-sm" id="navbar-links">
                <li class="ml-4">
                    <a href="{{ session('main-page') ?? route('home') }}" class="text-gray-100 hover:text-gray-300">Paylaşmalar</a>
                </li>
                <li class="ml-4">
                    <a href="{{ route('hubs-list') }}" class="text-gray-100 hover:text-gray-300">Hablar</a>
                </li>
                <li class="ml-4">
                    <a href="{{ route('users-list') }}" class="text-gray-100 hover:text-gray-300">Müəlliflər</a>
                </li>
                <li class="ml-4">
                    <a href="{{config('devhub.status_url')}}" class="text-gray-100 hover:text-gray-300">Status</a>
                </li>
                <li class="ml-4">
                    <a href="{{ url('/about_us') }}" class="text-gray-100 hover:text-gray-300">MƏLUMAT</a>
                </li>
            </ul>
        </div>
        <div class="relative xs:px-4" id="footer">
            <select-menu :side="'bottom'" class="xs:w-1/2 xs:mx-auto"
                         :menu="[
                    {'name': 'Azərbaycan', 'icon': 'twemoji:flag-for-flag-azerbaijan', 'url': '/lang/az'},
                    {'name': 'Русский', 'icon': 'twemoji:flag-for-flag-russia', 'url': '/lang/ru'},
                    {'name': 'English', 'icon': 'twemoji:flag-for-flag-united-kingdom', 'url': '/lang/en'}
                    ]"
                         @if (Session::get('locale') == 'az' || !Session::get('locale'))
                         :selected="{'name': 'Azərbaycan', 'icon': 'twemoji:flag-for-flag-azerbaijan', 'url': '/lang/az'}"
                         @elseif (Session::get('locale') == 'ru')
                         :selected="{'name': 'Русский', 'icon': 'twemoji:flag-for-flag-russia', 'url': '/lang/ru'}"
                         @elseif (Session::get('locale') == 'en')
                         :selected="{'name': 'English', 'icon': 'twemoji:flag-for-flag-united-kingdom', 'url': '/lang/en'}"
                @endif
            ></select-menu>
        </div>
    </div>
</footer>

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/footer.js') }}" async></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/footer.js') }}" as="script">
@endsection
