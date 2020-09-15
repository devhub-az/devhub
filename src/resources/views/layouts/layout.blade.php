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
<script type="text/javascript" src="{{ asset('js/scripts/scroll.js') }}" async></script>
<script type="text/javascript" src="{{ asset('js/scripts/search.js') }}" async></script>
@yield('scripts')
<script type="text/javascript">
    // if (document.getElementsByClassName('header-message')){
    //     const stickymessage = stickybits('.header-message');
    // }
</script>
</body>
</html>
