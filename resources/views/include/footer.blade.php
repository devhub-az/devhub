<footer class="text-gray-300 body-font bg-footer py-2 mt-auto">
    <div class="flex justify-between xs:block items-center xs:h-auto lg:container mx-auto">
        <div class="flex xs:block items-center">
            <a href="{{ route('home') }}" class="flex title-font font-medium items-center md:justify-start justify-center text-gray-100 xs:pb-4">
                <picture>
                    <source srcset="{{ asset('images/DevHub_Compact_Logo.webp') }}" type="image/webp">
                    <source srcset="{{ asset('images/DevHub_Compact_Logo.png') }}" type="image/png">
                    <img src="{{ asset('images/DevHub_Compact_Logo.png') }}" alt="DevHub Logo" width="40" height="40">
                </picture>
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
        <div class="relative">
            <button type="button" aria-haspopup="listbox" aria-expanded="true"
                    @click="show = !show"
                    title="Coming soon"
                    class="relative cursor-not-allowed text-black bg-gray-300 w-full bg-white border border-gray-300 rounded-md shadow-sm cursor-pointer hover:bg-gray-100 transition-colors pl-3 pr-7 h-7 text-left focus:outline-none focus:ring-0 focus:border-none sm:text-sm">
                <span class="flex items-center">
                    <span class="iconify" data-icon="clarity:world-line" data-inline="false"></span>
                    <span class="ml-1 block truncate">
                        Azərbaycan
                    </span>
                </span>
                <span class="ml-1 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                    <span class="iconify" data-icon="heroicons-outline:selector" data-inline="false"></span>
                </span>
            </button>
        </div>
    </div>
</footer>
