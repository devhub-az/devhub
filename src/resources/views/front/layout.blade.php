<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=576, user-scalable=no"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="@yield('description')"/>
    <meta name="keywords" content="@yield('keywords')"/>

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">

    @yield('meta')

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}" media="print" onload="this.media='all'">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" media="print" onload="this.media='all'">
    <link href="{{ asset('css/prettify.css') }}" media="print" onload="this.media='all'" rel="stylesheet"/>
    @yield('css')

    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Converter.js') }}"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Sanitizer.js') }}"></script>--}}
    {{--    <script type="text/javascript" src="{{ asset('js/Markdown.Editor.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/prettify.js') }}"></script>--}}
    {{--    <script src="{{ asset('js/Markdown.Extra.js') }}"></script>--}}

    <link rel="dns-prefetch" href="//fonts.googleapis.com"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&display=swap&subset=cyrillic"
          rel="stylesheet" media="print" onload="this.media='all'"/>
</head>

<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}">
{{-- Header --}}
@include('include.header')

{{--@if(session()->has('message'))--}}
{{--    <div class="header-message">--}}
{{--        <span>--}}
{{--            Lütfən, hesabınızı qorumaq üçün parametrlərdə parolu dəyişdirin. Şifrə dəyişdirildikdən sonra bu mesaj yox olacaq.--}}
{{--        </span>--}}
{{--    </div>--}}
{{--@endif--}}

@yield('main')

{{-- Footer --}}
@include('include.footer')

<script src="{{ mix('js/app.js') }}" async="async"></script>
{{--<script src="{{ asset('js/stickybits.min.js') }}"></script>--}}
{{--<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}

@yield('scripts')
{{--<script>--}}
{{--    $('.ui.dropdown').dropdown();--}}

{{--    var stickymessage = stickybits('.header-message');--}}

{{--    // $("#scroll_to_top").on("click", function () {--}}
{{--    // $("#scroll_to_top").on("click", function () {--}}
{{--    //     $('html, body').animate({--}}
{{--    //         scrollTop: 0--}}
{{--    //     }, 600);--}}
{{--    // })};--}}

{{--    function search() {--}}
{{--        const input = document.getElementById("form_search");--}}
{{--        const icon = document.getElementById("search-icon");--}}
{{--        const nav = document.getElementById("navbar-links");--}}
{{--        const search_input = document.getElementById("search_input");--}}

{{--        nav.style.display = "none";--}}
{{--        input.style.display = "flex";--}}
{{--        icon.style.display = "none";--}}
{{--        search_input.focus();--}}
{{--    }--}}

{{--    function closeSearch() {--}}
{{--        const input = document.getElementById("form_search");--}}
{{--        const icon = document.getElementById("search-icon");--}}
{{--        const nav = document.getElementById("navbar-links");--}}

{{--        nav.removeAttribute("style");--}}
{{--        input.removeAttribute("style");--}}
{{--        icon.removeAttribute("style");--}}
{{--    }--}}
{{--</script>--}}
</body>
</html>
