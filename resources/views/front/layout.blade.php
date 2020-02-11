<!DOCTYPE html>
{{-- [if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif] --}}
{{-- [if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif] --}}
{{-- [if (gte IE 9)|!(IE)]><! --}}
<html lang="{{ app()->getLocale() }}">
{{-- <![endif] --}}
<head>
    {{-- basic page needs --}}
    <meta charset="utf-8">
    <title>@yield('title', 'DevHub') | DevHub</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    {{-- mobile specific metas --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script type="text/x-mathjax-config">
	 	MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});

    </script>
    <script type="text/javascript" async
            src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/latest.js?config=TeX-MML-AM_CHTML">
    </script>
{{--    <script src="{{ asset('js/highlight.min.js') }}"></script>--}}
{{--    <script src="{{ asset('js/highlight.pack.js') }}"></script>--}}
{{--    <script>hljs.initHighlightingOnLoad();</script>--}}

    {{-- CSS --}}
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Fira+Sans|Roboto:300,400,500,700|PT+Sans&display=swap"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/notification.css') }}">
    <link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/prettify.css') }}" type="text/css" rel="stylesheet"/>
    @yield('css')

    <script type="text/javascript" src="{{ asset('js/Markdown.Converter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Markdown.Sanitizer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/Markdown.Editor.js') }}"></script>
    <script src="{{ asset('js/prettify.js') }}"></script>
    <script src="{{ asset('js/Markdown.Extra.js') }}"></script>

    {{-- favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon//site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>

<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}">
{{--{{dd(\Cookie::get('atr'))}}--}}
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

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/stickybits.min.js') }}"></script>
{{--<script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>--}}

@yield('scripts')
<script>
    $('.ui.dropdown').dropdown();

    var stickymessage = stickybits('.header-message');

    // $("#scroll_to_top").on("click", function () {
    // $("#scroll_to_top").on("click", function () {
    //     $('html, body').animate({
    //         scrollTop: 0
    //     }, 600);
    // })};

    function search() {
        const input = document.getElementById("form_search");
        const icon = document.getElementById("search-icon");
        const nav = document.getElementById("navbar-links");
        const search_input = document.getElementById("search_input");

        nav.style.display = "none";
        input.style.display = "flex";
        icon.style.display = "none";
        search_input.focus();
    }

    function closeSearch() {
        const input = document.getElementById("form_search");
        const icon = document.getElementById("search-icon");
        const nav = document.getElementById("navbar-links");

        nav.removeAttribute("style");
        input.removeAttribute("style");
        icon.removeAttribute("style");
    }
</script>
</body>
</html>
