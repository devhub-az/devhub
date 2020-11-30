<footer class="text-gray-300 body-font bg-footer py-2">
    <div class="container mx-auto flex ">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-100">
            <span class="text-xl font-bold md:text-2xl">DevHub</span>
        </a>
        <p class="text-sm text-gray-100 pl-4 py-2 my-auto">
            &copy; 2019 - {{ date('Y') }}
        </p>
        <ul class="flex my-auto ml-4 flex-wrap uppercase text-sm" id="navbar-links">
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
