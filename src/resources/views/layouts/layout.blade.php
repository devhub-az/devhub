<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('include.meta')

    <link rel="preload" as="font" type="font/otf"
          href="{{ asset('./fonts/vendor/@mdi/materialdesignicons-webfont.woff2') }}" crossorigin>

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">

{{--    <link rel="preload" href="{{ asset('js/scripts/lazysizes.min.js') }}" as="script">--}}

    @yield('meta')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" media="print" onload="this.media='all'">

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
<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}" class="flex bg-gray-50 font-sans flex-col min-h-screen transition">
{{--<span class="scroll-top mb:hidden" id="scroll-top" onclick="scrollToTop()" style="opacity: 0;">--}}
{{--    <i class="mdi mdi-chevron-up"></i>--}}
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

{{--<script type="text/javascript" src="{{ asset('js/highlight.min.js') }}"></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/scripts/popper.min.js') }}" async></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/scripts/lazysizes.min.js') }}" async></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/scripts/scroll.js') }}" async></script>--}}
{{--<script type="text/javascript" src="{{ asset('js/scripts/search.js') }}" async></script>--}}
@yield('scripts')
</body>
</html>
