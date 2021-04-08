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

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ mix('css/tailwind.css') }}" rel="stylesheet">

    @yield('meta')

    @yield('styles')

    <script>
        window.Language = '{{ config('app.locale') }}';

        window.Laravel = <?php echo json_encode(
            [
                'csrfToken' => csrf_token(),
            ]
        ); ?>
    </script>

</head>

<body data-theme="{{ Cookie::get('atr') ?? 'default' }}" class="flex bg-gray-100 font-sans flex-col min-h-screen"
      style="linear-gradient(to top, rgb(202 202 202) 13%, rgb(243, 244, 246) 57%);">

<div id="app">
    @yield('main')
</div>

<script src="{{ asset('js/login.js') }}" async="async"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}" defer></script>
<script type="text/javascript" src="{{ mix('js/manifest.js') }}" defer></script>
<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
@yield('scripts')
</body>
</html>
