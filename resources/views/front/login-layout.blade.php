<!DOCTYPE html>
{{-- [if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif] --}}
{{-- [if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif] --}}
{{-- [if (gte IE 9)|!(IE)]><! --}}
<html lang="{{ config('app.locale') }}">
{{-- <![endif] --}}
<head>
	{{-- basic page needs --}}
	<meta charset="utf-8">
	<title>@yield('title') | DevHub</title>
	<meta name="description" content="{{ isset($post) && $post->meta_description ? $post->meta_description : __('description') }}">
	<meta name="author" content="@lang(lcfirst ('Author'))">
	@if(isset($post) && $post->meta_keywords)
		<meta name="keywords" content="{{ $post->meta_keywords }}">
	@endif
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- mobile specific metas --}}
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	{{-- CSS --}}
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="{{ asset('css/a11y-light.css') }}" rel="stylesheet">
	<link href="{{ asset('css/quill.snow.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/quill.mention.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('css/buttons.css') }}">
	<link rel="stylesheet" href="{{ asset('css/login.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	@yield('css')

	{{-- favicon --}}
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

</head>

<body>

	<div id="app">
		@yield('main')
	</div>
	
	<script src="{{ asset('js/app.js') }}"></script>
	@yield('scripts')

</body>
</html>