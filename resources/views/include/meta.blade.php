<meta name="viewport" content="initial-scale=1, user-scalable=1, width=device-width">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="#1d1d1d">
<meta name="apple-touch-startup-image" content="{{ asset('images/DevHub_Compact_Logo.svg') }}">
<link rel="apple-touch-icon" href="{{ asset('images/DevHub_Compact_Logo.svg') }}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="msapplication-TileImage" content="{{ asset('images/DevHub_Compact_Logo.svg') }}">
<meta name="msapplication-TileColor" content="#1d1d1d">
<meta name="msapplication-navbutton-color" content="#1d1d1d">
<meta name="theme-color" content="#1d1d1d">

<meta name="robots" content="index, follow, noodp, noydir">

<meta name="medium" content="blog">
<meta name="audience" content="all">
<meta name="distribution" content="global">
<meta name="rating" content="General">
<meta name="allow-search" content="yes">
<meta name="country" content="Azerbaijan">
<meta name="language" content="{{ app()->getLocale() }}">
<meta name="content-language" content="{{ app()->getLocale() }}">
<meta name="format-detection" content="telephone=no">

{{--@if($emails = $setting->emails)--}}
{{--    <meta name="contact" content="{{ $emails[0] }}">--}}
{{--    <meta name="reply-to" content="{{ $emails[0] }}">--}}
{{--    <meta name="e-mail" content="{{ $emails[0] }}">--}}
{{--@endif--}}

<meta name="designer" content="Hose1021">
<meta name="generator" content="Hose1021">
<meta name="copyright" content="{{ Request::getHost() }} © 2019 @lang('general.copyright')">

{{--@php($limit = $setting->description_limit)--}}
{{--@php($desc = mb_substr($setting->description, 0, $limit))--}}

<meta name="description"
      content="@yield('description', 'DevHub Azərbaycanda proqramlaşdırma inkişaf səviyyəsini artırmaq istəyən gənc bir inkişaf qrupudur.')">
<meta name="keywords" content="@yield('keywords', 'IT-blog')">

<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ '@'.Request::getHost() }}">
<meta name="twitter:title" content="@yield('title', 'DevHub')">
<meta name="twitter:description"
      content="@yield('description', 'DevHub Azərbaycanda proqramlaşdırma inkişaf səviyyəsini artırmaq istəyən gənc bir inkişaf qrupudur.')">
<meta name="twitter:url" content="{{ Request::fullUrl() }}">
<meta name="twitter:domain" content="{{ Request::getHost() }}">
<meta name="twitter:creator" content="{{ '@'.Request::getHost() }}">
<meta name="twitter:image" content="@yield('share-image', '')">
{{--<meta name="twitter:account_id" content="{{ $setting->twitter_account_id }}">--}}

{{--<meta property="fb:app_id" content="{{ $setting->fb_app_id }}">--}}
{{--<meta property="fb:pages" content="{{ $setting->fb_pages }}">--}}
{{--<meta property="fb:admins" content="{{ $setting->fb_admins }}">--}}

<meta property="og:type" content="@yield('og-type', '-.-')">
<meta property="og:title" content="@yield('title', 'DevHub')">
<meta property="og:description"
      content="@yield('description', 'DevHub Azərbaycanda proqramlaşdırma inkişaf səviyyəsini artırmaq istəyən gənc bir inkişaf qrupudur.')">
<meta property="og:url" content="{{ Request::fullUrl() }}">
<meta property="og:site_name" content="{{ Request::getHost() }}">
<meta property="og:locale" content="{{ app()->getLocale() }}">

@isset($post)
    @yield('article')
@else
    <meta property="og:video" content="http://www.youtube.com/v/omQeHsmuLr8">
    <meta property="og:video:url" content="http://www.youtube.com/v/omQeHsmuLr8">
    <meta property="og:video:secure_url" content="https://www.youtube.com/v/omQeHsmuLr8">
    <meta property="og:video:type" content="application/x-shockwave-flash">
    <meta property="og:video:width" content="1280">
    <meta property="og:video:height" content="720">
    <meta property="og:video:tag" content="devhub">
    <meta property="og:video:tag" content="devhub baku">
    <meta property="og:video:tag" content="devhub azerbaijan">
    <meta property="og:video:tag" content="devhub blog">
@endisset

<meta property="og:image" content="@yield('share-image', '')">
<meta property="og:image:secure_url" content="@yield('share-image', '')">
<meta property="og:image:type" content="image/svg+xml">
<meta property="og:image:width" content="920">
<meta property="og:image:height" content="520">
<meta property="og:image:alt" content="@yield('image-alt', asset('images/DevHub_Compact_Logo.svg'))">

<link rel="manifest" href="{{ asset('/images/favicon/site.webmanifest') }}">
