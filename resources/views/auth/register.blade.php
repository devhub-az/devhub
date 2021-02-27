@extends('layouts.layout')

@section('title')Qeydiyyat səhifəsi @stop

@section('main')
    <div class="lg:container xl:container my-4 mx-4 sm:mx-0 xs:mx-0 lg:mx-auto xl:mx-auto mt-28 xs:px-4 flex">
        <main class="w-6/12 sm:mt-12 my-auto sm:px-6">
            <div class="sm:text-center lg:text-left mx-auto">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl text-5xl">
                    <span class="block xl:inline dark:text-gray-100">Data to enrich your</span>
                    <span class="block text-indigo-600 xl:inline">online business</span>
                </h1>
                <p class="mt-3 text-base text-gray-300 text-xl">
                    Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit
                    sunt
                    amet fugiat veniam occaecat fugiat aliqua.
                </p>
            </div>
        </main>
        <div class="w-5/12 ml-auto z-10">
            <div class="bg-white rounded-lg border">
                <div class="py-8 px-10">
                    <p class="font-medium mb-1 text-sm text-gray-700">Sign in with</p>
                    <div class="flex w-full">
                        <a href="#"
                           class="btn-outline border-gray-300 dark:border-gray-300 rounded-lg w-full items-center dark:text-black">
                            <span class="block mx-auto dark:text-gray-700 text-gray-700">
                                <span class="iconify text-base dark:text-gray-700" data-icon="simple-icons:github"
                                      data-inline="false"></span>
                            </span>
                        </a>
                    </div>
                    <div class="flex justify-between items-center py-4">
                        <hr class="flex-grow dark:border-gray-300 border-gray-300">
                        <div class="px-4 text-gray-400">və ya</div>
                        <hr class="flex-grow dark:border-gray-300 border-gray-300">
                    </div>
                    <div class="flex flex-col space-y-4">
                        <label>
                            <input type="text" placeholder="Username"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </label>
                        <label>
                            <input type="text" placeholder="Email"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </label>
                        <label>
                            <input type="text" placeholder="Password"
                                   class="mt-1 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </label>
                        <div class="">
                            <a href="#" class="btn w-full shadow-sm rounded-md text-center border-none">
                                <span class="block mx-auto">Qeydiyyatdan keçmək</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--    <div class="xs:pt-20 text-center absolute top-1/2 left-1/2 -mr-1/2"--}}
    {{--         style="transform: translate(-50%, -50%)" id="app">--}}
    {{--        <a href="{{ route('home') }}"--}}
    {{--           class="text-black font-bold hover:text-gray-200 md:text-2xl m-auto">--}}
    {{--            <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="188"--}}
    {{--                 height="36" class="mb-4 mx-auto">--}}
    {{--        </a>--}}
    {{--        <register></register>--}}
    {{--    </div>--}}
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/login.js') }}"></script>
@endpush

@section('styles')
    @parent
    <link rel="preload" href="{{ mix('js/login.js') }}" as="script">
@endsection
