<div class="flex w-screen h-screen">
    <div class="flex flex-col text-xl bg-white items-center w-2/12 border-r shadow-lg">
        <div class="border-b border-r bg-gray-200 w-full border-gray-300">
            <a class="flex items-center flex-shrink-0 w-full h-16 px-4" href="{{route('home')}}">
                <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="128"
                     height="36" class="max-w-max xs:h-8">
            </a>
        </div>
        <div class="w-full px-2 space-y-2 py-4">
            <a class="flex items-center space-x-1 flex-shrink-0 rounded hover:bg-gray-200 w-full h-10 px-2" href="{{ route('admin') }}">
                <span class="iconify" data-icon="fluent:home-20-filled" data-inline="false"></span>
                <p>Главная</p>
            </a>


{{--            <a class="flex items-center flex-shrink-0 rounded hover:bg-gray-800 w-full h-7" href="{{ route('admin.logs') }}">--}}
{{--                <span class="iconify" data-icon="fluent:task-list-ltr-24-regular" data-inline="false"></span>--}}
{{--                <p></p>--}}
{{--            </a>--}}
        </div>
        <div class="mt-auto border-t border-r bg-gray-200 w-full border-gray-300">
            <div class="flex px-4 py-4 space-x-2">
                <img
                    src="{{ (Auth::user()->avatar !== 'default') ? Auth::user()->getMedia('avatars')->first()->getFullUrl() : config('devhub.default_avatar') }}"
                    alt="{{ __('devhub.authorLogo') }}" class="w-12 h-12 rounded">
                <div class="">
                    <p>{{ Auth::user()->name }}</p>
                    <p class="text-sm">{{ Auth::user()->username }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col flex-grow">
        @yield('content')
    </div>
</div>
