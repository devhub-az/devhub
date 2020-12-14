@extends('layouts.login-layout')

@section('title')Qeydiyyat səhifəsi @stop

@section('main')
    <div class="flex">
        {{--        <div class="login__left">--}}
        {{--            --}}{{--                @include('auth.import.left_side')--}}
        {{--            --}}{{--                <div id="particles-js"></div>--}}
        {{--        </div>--}}
        <div class="mx-auto pt-44 xs:pt-20 text-center">
            <a href="{{ route('home') }}"
               class="text-black font-bold hover:text-gray-200 md:text-2xl m-auto">
                <img src="{{ asset('images/DevHub_Monochrome_Full_Logo.svg') }}" alt="DevHub Logo" width="188"
                     height="36" class="mb-4 mx-auto">
            </a>
            <register></register>
            <div class="w-full border-t border-gray-300 my-4"></div>
            <div class="flex justify-between">
                <div class="flex items-center">
                    <i class="mdi mdi-thumbs-up-down inline-block m-auto w-10 h-10 p-1.5 bg-gray-700 rounded-lg text-xl text-white"></i>
                    <div class="text-left text-sm ml-2">
                        <p>Ses</p>
                        <p>ver</p>
                    </div>
                </div>
                <div class="flex">
                    <i class="mdi mdi-layers-outline inline-block m-auto w-10 h-10 p-1.5 bg-gray-700 rounded-lg text-xl text-white"></i>
                    <div class="text-left text-sm ml-2">
                        <p>Paylaşmalar</p>
                        <p>yaz</p>
                    </div>
                </div>
                <div class="flex">
                    <i class="mdi mdi-bookmark-multiple-outline inline-block m-auto w-10 h-10 p-1.5 bg-gray-700 rounded-lg text-xl text-white"></i>
                    <div class="text-left text-sm ml-2">
                        <p>Izləici</p>
                        <p>ol</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{--@section('scripts')--}}
{{--    <script src="{{ asset('js/scripts/particles.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/scripts/particles.settings.js') }}"></script>--}}
{{--@endsection--}}
