@extends('layouts.login-layout')

@section('title')Login səhifəsi @stop

@section('main')
    <div class="container">
        <div class="login">
            <div class="login__left">
                {{--                @include('auth.import.left_side')--}}
                {{--                <div id="particles-js"></div>--}}
            </div>
            <div class="login__right" id="app">
                <div class="ColumnContainer mode-auth">
                    <a href="{{ route('home') }}"
                       class="text-black text-2xl pr-2 font-bold hover:text-gray-200 md:text-2xl m-auto">DevHub</a>
                    <login></login>
                </div>
                <div class="login__footer">
                    © 2019 - {{ date('Y') }} DevHub
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/scripts/particles.min.js') }}"></script>
    <script src="{{ asset('js/scripts/particles.settings.js') }}"></script>
@endsection
