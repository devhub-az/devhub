@extends('front.layout')

@section('title')Saved @stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/saved.css') }}">
@stop

@section('main')
    <div class="layout_body" id="app">
        <div class="header">
            <div class="nav_posts">
                <a href="{{ route('saved-posts') }}">Posts</a>
                <a href="{{ route('saved-comments') }}">Comments</a>
            </div>
        </div>

        <comments
            :url="'{{ $url }}'"
            @auth :auth_check="true" @endauth
        ></comments>

    </div>
@endsection
