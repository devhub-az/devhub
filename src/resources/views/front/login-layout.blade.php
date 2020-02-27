<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
{{-- <![endif] --}}
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
	<link rel="stylesheet" href="{{ mix('css/login.css') }}" media="print" onload="this.media='all'">
	@yield('css')

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,400,400i,700,700i&display=swap&subset=cyrillic"
		  rel="stylesheet" media="print" onload="this.media='all'"/>

</head>

<body data-theme="{{ \Cookie::get('atr') ?? 'default' }}">

	<div id="app">
		@yield('main')
	</div>
	
	<script src="{{ mix('js/login.js') }}" async="async"></script>
	@yield('scripts')

</body>
</html>
