<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('include.meta')

    <link rel="preload" as="font" type="font/otf"
          href="{{ asset('./fonts/materialdesignicons-webfont.woff2') }}" crossorigin>
    <link rel="preload" as="font" type="font/otf"
          href="{{ asset('./fonts/MontDemo-Heavy.otf') }}" crossorigin>
    <link rel="preload" as="font" type="font/ttf"
          href="{{ asset('./fonts/roboto/Roboto-Regular.ttf') }}" crossorigin>

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preload" href="{{ mix('js/app.js') }}" as="script">
    <link rel="preload" href="{{ asset('js/scripts/lazysizes.min.js') }}" as="script">

    @yield('meta')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" media="print" onload="this.media='all'">
    <style>
        @php
            include(public_path('css/app.css'));
        @endphp
    </style>
    @yield('css')
</head>

{{--<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}" itemscope itemtype="http://schema.org/WebPage">--}}
<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}">

<button onclick="scrollToTop()" style="position:fixed; top: 50%;">
    -
</button>

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

<script type="text/javascript" src="{{ asset('js/scripts/popper.min.js') }}" async></script>
<script type="text/javascript" src="{{ asset('js/scripts/lazysizes.min.js') }}" async></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}" async></script>
@yield('scripts')
</body>
<script type="text/javascript">
    var stickymessage = stickybits('.header-message');

    function scrollToTop () {
        if (document.scrollingElement.scrollTop === 0) return;

        const totalScrollDistance = document.scrollingElement.scrollTop;
        let scrollY = totalScrollDistance, oldTimestamp = null;

        function step (newTimestamp) {
            if (oldTimestamp !== null) {
                scrollY -= totalScrollDistance * (newTimestamp - oldTimestamp) / 1000;
                if (scrollY <= 0) return document.scrollingElement.scrollTop = 0;
                document.scrollingElement.scrollTop = scrollY;
            }
            oldTimestamp = newTimestamp;
            window.requestAnimationFrame(step);
        }
        window.requestAnimationFrame(step);
    }

    function search() {
        const input = document.getElementById("form_search");
        const icon = document.getElementById("search-icon");
        const nav = document.getElementById("menu");
        const search_input = document.getElementById("search_input");

        nav.style.display = "none";
        input.style.display = "flex";
        icon.style.display = "none";
        search_input.focus();
    }

    function closeSearch() {
        const input = document.getElementById("form_search");
        const icon = document.getElementById("search-icon");
        const nav = document.getElementById("menu");

        nav.removeAttribute("style");
        input.removeAttribute("style");
        icon.removeAttribute("style");
    }
</script>
</html>
