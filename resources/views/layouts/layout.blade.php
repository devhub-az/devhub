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
    <link rel="preload" href="{{ mix('js/scroller.js') }}" as="script">

    @yield('meta')

    {{-- CSS --}}
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/balloon.css') }}" media="print" onload="this.media='all'">

    <!-- Scripts -->
    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode(
            [
                'csrfToken' => csrf_token(),
            ]
        ); ?>
    </script>

    <style>
        {{ include('css/tailwind.css') }}
    </style>
    @yield('styles')
</head>

{{--<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}" itemscope itemtype="http://schema.org/WebPage">--}}
<body class="flex bg-wall font-sans flex-col min-h-screen overflow-x-hidden dark:bg-dwall"
      itemscope itemtype="http://schema.org/WebPage">

{{-- Header --}}
@include('include.header')

<div id="scroller"
     class="hidden hover:bg-gray-200 cursor-pointer text-center h-screen w-10 my-auto z-50 opacity-40 xs:hidden">
    <div id="mdi-chevron-up" class="relative top-1/2">
        <span class="iconify text-2xl w-full" data-icon="bi:arrow-up-circle" data-inline="false"></span>
    </div>
    <div id="mdi-chevron-down" class="hidden relative top-1/2">
        <span class="iconify text-2xl w-full" data-icon="bi:arrow-down-circle" data-inline="false"></span>
    </div>
</div>

@if(Cookie::get('message') !== null)
    <div class="header-message {{ Cookie::get('alert-class', 'alert-info') }}" onclick="">
        <span>
            {{ Cookie::get('message') }}
        </span>
    </div>
@endif

<div id="content">
    @yield('main')
</div>

{{-- Footer --}}
@include('include.footer')
<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
<script type="text/javascript" src="{{ mix('js/scroller.js') }}"></script>
@stack('scripts')
</body>
</html>
