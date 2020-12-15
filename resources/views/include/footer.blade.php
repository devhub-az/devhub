<footer class="text-gray-300 body-font bg-footer py-2 mt-auto">
    <div class="flex xs:block items-center xs:h-auto lg:container mx-auto">
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
                <a href="{{ url('/about_us') }}" class="text-gray-100 hover:text-gray-300">MƏLUMAT</a>
            </li>
        </ul>
    </div>
</footer>
