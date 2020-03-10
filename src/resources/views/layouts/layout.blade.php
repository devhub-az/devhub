<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('include.meta')

    <link rel="preload" as="font" type="font/otf"
          href="{{ asset('./fonts/materialdesignicons-webfont.woff2') }}" crossorigin>
    <link rel="preload" as="font" type="font/otf"
          href="{{ asset('./fonts/MontDemo-Heavy.otf') }}" crossorigin>
    <link rel="preload" as="font" type="font/woff2"
          href="{{ asset('./fonts/roboto/roboto-v20-latin_cyrillic-100.woff2') }}" crossorigin>
    <link rel="preload" as="font" type="font/woff2"
          href="{{ asset('./fonts/roboto/roboto-v20-latin_cyrillic-700.woff2') }}" crossorigin>
    <link rel="preload" as="font" type="font/woff2"
          href="{{ asset('./fonts/roboto/roboto-v20-latin_cyrillic-italic.woff2') }}" crossorigin>
    <link rel="preload" as="font" type="font/woff2"
          href="{{ asset('./fonts/roboto/roboto-v20-latin_cyrillic-regular.woff2') }}" crossorigin>

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link rel="preload" href="{{ mix('js/app.js') }}" as="script">
    <link rel="preload" href="{{ asset('js/scripts/lazysizes.min.js') }}" as="script">

    @yield('meta')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" media="print" onload="this.media='all'">
    {{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}">--}}
    <style>
        @php
            include(public_path('css/app.css'));
        @endphp
    </style>
    @yield('css')

    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Converter.js') }}"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Sanitizer.js') }}"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Editor.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/prettify.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/Markdown.Extra.js') }}"></script>--}}
</head>

{{--<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}" itemscope itemtype="http://schema.org/WebPage">--}}
<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}">
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

{{--<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}
<script type="text/javascript" src="{{ asset('js/scripts/lazysizes.min.js') }}" async></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}" async></script>
@yield('scripts')
<script>
    // var stickymessage = stickybits('.header-message');

    function expand() {
        $(this).toggleClass("on");
        $(".nav-links").toggleClass("active");
    }

    // $("#scroll_to_top").on("click", function () {
    // $("#scroll_to_top").on("click", function () {
    //     $('html, body').animate({
    //         scrollTop: 0
    //     }, 600);
    // })};

    // function search() {
    //     const input = document.getElementById("form_search");
    //     const icon = document.getElementById("search-icon");
    //     const nav = document.getElementById("navbar-links");
    //     const search_input = document.getElementById("search_input");
    //
    //     nav.style.display = "none";
    //     input.style.display = "flex";
    //     icon.style.display = "none";
    //     search_input.focus();
    // }
    //
    // function closeSearch() {
    //     const input = document.getElementById("form_search");
    //     const icon = document.getElementById("search-icon");
    //     const nav = document.getElementById("navbar-links");
    //
    //     nav.removeAttribute("style");
    //     input.removeAttribute("style");
    //     icon.removeAttribute("style");
    // }
</script>
</body>
</html>
