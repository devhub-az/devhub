<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
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

    @yield('meta')

    <style>
        {{ include('css/tailwind.css') }}
    </style>
    @yield('styles')

</head>

<body data-theme="{{ Cookie::get('atr') ?? 'default' }}" class="flex bg-gray-100 font-sans flex-col min-h-screen"
    style="linear-gradient(to top, rgb(202 202 202) 13%, rgb(243, 244, 246) 57%);">

<div id="app">
    @yield('main')
</div>

<div class="body-font bg-white border-t shadow mt-auto text-center">
    <p class="text-xs py-4 text-gray-700">© 2019 - {{ date('Y') }} DevHub</p>
</div>

<script src="{{ asset('js/login.js') }}" async="async"></script>
<script src="//code.iconify.design/1/1.0.6/iconify.min.js"></script>
@yield('scripts')
</body>
</html>
