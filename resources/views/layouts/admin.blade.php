<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
{{--    @include('layouts._iubenda')--}}

    @include('include.meta')
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <meta name="theme-color" content="#ffffff">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'DevHub') | DevHub</title>

    <link href="{{ mix('css/tailwind.css') }}" rel="stylesheet">
    @stack('meta')

    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>
</head>

<body class="{{ $bodyClass ?? '' }} {{ isset($isTailwindUi) && $isTailwindUi ? '' : 'standard' }} font-sans bg-white"
      x-data="{ activeModal: null }">

{{--@include('layouts._ads._banner')--}}
{{--@include('layouts._nav')--}}

@yield('content')

<script src="{{ asset('js/admin.js') }}" defer></script>
<script src="//code.iconify.design/1/1.0.6/iconify.min.js" async></script>

{{--@include('layouts._footer')--}}

</body>
</html>
