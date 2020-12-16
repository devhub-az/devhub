<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script>
        if (localStorage.theme === 'dark') {
            document.querySelector('html').classList.add('dark')
        }
    </script>

    @include('include.meta')

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{--    <link rel="preload" href="{{ asset('js/scripts/lazysizes.min.js') }}" as="script">--}}

    @yield('meta')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">

    <script>
        window.Language = '{{ config('app.locale') }}';
    </script>

    <style>
        {{ include('css/tailwind.css') }}
        {{--        {{ include('css/app.css') }}--}}
    </style>
    @yield('styles')
</head>

{{--<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}" itemscope itemtype="http://schema.org/WebPage">--}}
<body class="flex bg-gray-50 font-sans flex-col min-h-screen overflow-x-hidden dark:bg-gray-900"
      itemscope itemtype="http://schema.org/WebPage">

{{--<span class="scroll-top mb:hidden" id="scroll-top" onclick="scrollToTop()" style="opacity: 0;">--}}
{{--    <i class="iconify" data-icon="mdi-chevron-up"></i>--}}
{{--</span>--}}

{{-- Header --}}
@include('include.header')

@if(Cookie::get('message') !== null)
    <div class="header-message {{ Cookie::get('alert-class', 'alert-info') }}" onclick="">
        <span>
            {{ Cookie::get('message') }}
        </span>
    </div>
@endif

@yield('main')

{{-- Footer --}}
@include('include.footer')
<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
@stack('scripts')
</body>
</html>
